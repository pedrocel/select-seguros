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
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function index(Request $request)
    {

        $totalUsers = User::count();

        // 2. Quantidade de novos clientes este mês
        $newClientsThisMonth = User::whereMonth('created_at', Carbon::now()->month)
                                    ->whereYear('created_at', Carbon::now()->year)
                                    ->count();
    
        // 3. Porcentagem de novos clientes este mês
        $percentageNewClients = $totalUsers > 0 ? ($newClientsThisMonth / $totalUsers) * 100 : 0;
    
        // 5. Expectativa total de clientes no ano atual (exemplo de projeção)
        // Supondo que o crescimento médio de novos clientes por mês seja 5%
        $growthRate = 0.05;
        $expectedClients = $totalUsers * pow(1 + $growthRate, Carbon::now()->month);



        

        $query = User::query();

        // Verificando se há um termo de pesquisa
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->orWhere('Whatsapp', 'LIKE', "%{$search}%")
                ->orWhere('cpf', 'LIKE', "%{$search}%");
            });
        }

        $users = $query->get();  // Obtendo os usuários filtrados

        if ($request->ajax()) {
            // Retornando a nova lista de usuários para a resposta AJAX
            return response()->json([
                'html' => view('director.users.create-user-partial', compact('users'))->render()
            ]);
        }

       
        $profiles = PerfilModel::all();

        return view('director.users.index', compact('users', 'profiles', 'totalUsers', 'newClientsThisMonth', 'percentageNewClients', 'expectedClients'));
    }

    public function create($organization_id)
    {
        $profiles = PerfilModel::all();
        $organizations = OrganizationModel::all();
        $organization = OrganizationModel::find($organization_id); // Ajuste conforme necessário para obter a organização correta
        return view('users.create', compact('profiles', 'organizations', 'organization'));
    }

    public function store(Request $request)
    {
        
        $user = Auth::user();
        $org = UserOrganizationModel::where('user_id', $user->id)->first();
        $organization = OrganizationModel::find($org->organization_id); // Ajuste conforme necessário para obter a organização correta

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
            'organization_id' => $organization->id, 
            'status' => 1
        ]);

        return redirect()->route('diretor.users.index', $organization->id)->with('status', 'success')->with('message', 'Usuário cadastrado com sucesso!');
    }

    public function storeAdm(Request $request)
    {
        
        $user = Auth::user();
        $org = UserOrganizationModel::where('user_id', $user->id)->first();
        $organization = OrganizationModel::first(); // Ajuste conforme necessário para obter a organização correta

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
            'organization_id' => $organization->id, 
            'status' => 1
        ]);

        return redirect()->route('admin.organizacoes.show', $organization->id)->with('success', 'Usuário criado e associado com sucesso!');
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
