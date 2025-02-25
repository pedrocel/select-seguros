<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DocumentType;
use App\Models\FaceEvent;
use App\Models\OrganizationModel;
use App\Models\PerfilModel;
use App\Models\ResponsibleType;
use App\Models\StudentResponsible;
use App\Models\User;
use App\Models\UserOrganizationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function show(User $user)
    {
        $profiles = PerfilModel::all();
        $responsibleTypes = ResponsibleType::all();
        $documentTypes = DocumentType::all();
        $faceEvents = FaceEvent::where('user_id', $user->id)->get();

        $requiredDocumentTypes = DocumentType::where('is_required', true)->get();

        $documents = [];

        foreach ($requiredDocumentTypes as $documentType) {
            $document = Document::where('document_type_id', $documentType->id)
                ->where('student_id', $user->id)
                ->first();
            
            $documents[] = [
                'id' => $document ? $document->id : null,
                'document_type' => $documentType,
                'file_path' => $document ? $document->file_path : null,
                'status' => $document ? $document->status : 'not_env'
            ];
        }

        return view('users.show', compact('user', 'profiles', 'responsibleTypes', 'documentTypes', 'documents', 'faceEvents'));    
    }

    public function index()
    {
        $users = User::paginate(10);  // Obtém todos os usuários
        return view('users.index', compact('users'));  // Exibe a lista de usuários
    }

    public function create($organization_id)
    {
        $profiles = PerfilModel::all();
        $organizations = OrganizationModel::all();
        $organization = OrganizationModel::find($organization_id); // Ajuste conforme necessário para obter a organização correta
        return view('users.create', compact('profiles', 'organizations', 'organization'));
    }

    public function store(Request $request, $organization_id)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'whatsapp'       => $request->whatsapp,
            'cpf'            => $request->cpf,
            'birthdate'     => $request->birthdate,
            'is_emancipated' => false, // Retorna true se o checkbox estiver marcado
        ]);

        // Relacionamento com o perfil
        $user->perfis()->attach($request->profile_id, ['is_atual' => true, 'status' => 1]);
        $user->save();

        UserOrganizationModel::create([
            'user_id' => $user->id,
            'organization_id' => $organization_id, 
            'status' => 1
        ]);

        return redirect()->route('admin.organizacoes.show', $organization_id)->with('success', 'Usuário criado e associado com sucesso!');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));  // Exibe o formulário para editar um usuário
    } 

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    public function destroy(User $user)
    {
        $user->delete();  // Exclui o usuário
        return redirect()->route('users.index')->with('success', 'Usuário excluído com sucesso!');
    }

    public function addResponsible(Request $request, $user_id)
    {
        // Criação do responsável
        $responsible = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'birthdate' => $request->birthdate,
            ]);

        // Relacionamento com o perfil de responsável
        $responsible->perfis()->attach(6, ['is_atual' => true, 'status' => 1]);

        $user = User::findOrFail($user_id);
        // Relacionamento com a organização
        $organization = $user->organizations()->first();
        $responsible->organizations()->attach($organization->id);

        // Relacionamento com o usuário
        StudentResponsible::create([
            'id_student' => $user_id,
            'id_responsible' => $responsible->id,
            'responsible_type_id' => $request->responsible_type_id,
            'status' => true,
        ]);

        return redirect()->route('admin.users.show', $user_id)->with('success', 'Responsável adicionado com sucesso!');
    }

    public function addStudent(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Criação do aluno
        $student = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'birthdate' => $request->birthdate,
        ]);

        // Relacionamento com o perfil de aluno
        $student->perfis()->attach(7, ['is_atual' => true, 'status' => 1]);

        // Relacionamento com a organização
        $organization = $user->organizations()->first();
        $student->organizations()->attach($organization->id);

        // Relacionamento com o responsável
        StudentResponsible::create([
            'id_student' => $student->id,
            'id_responsible' => $user->id,
            'responsible_type_id' => 1, // Defina o tipo de responsável conforme necessário
            'status' => true,
        ]);

        return redirect()->route('admin.users.show', $user)->with('success', 'Aluno adicionado com sucesso!');
    }

    public function updateFacialImage(Request $request, $userId)
    {
        // Validação da requisição
        $validated = $request->validate([
            'facial_image_base64' => 'required|string',
        ]);

        // Obtém o usuário pelo ID
        $user = User::findOrFail($userId);

        // Atualiza os dados do usuário
        $user->facial_image_base64 = $validated['facial_image_base64'];
        $user->status = 3; // Status 3 = Cadastro de Biometria Facial Pendente
        $user->save();

        return redirect()->route('admin.users.show', $user)->with('success', 'Imagem facial e status atualizados com sucesso!');
    }
}
