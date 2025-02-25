<?php

namespace App\Http\Controllers\Director;

use App\Http\Controllers\Controller;
use App\Http\Requests\PreRegisterRequest;
use App\Imports\CpfImport;
use App\Models\OrganizationModel;
use App\Models\PerfilModel;
use App\Models\StudentInputsModel;
use App\Models\StudentResponsible;
use App\Models\User;
use App\Models\UserOrganizationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class StudentsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $org = UserOrganizationModel::where('user_id', $user->id)->first();
        $profiles = PerfilModel::all();
        $userOrganization = UserOrganizationModel::where('organization_id', $org->organization_id)
        ->whereHas('user', function ($query) {
            // Filtro para obter apenas os usuários com perfilAtual igual a 7
            $query->whereHas('perfis', function ($subQuery) {
                $subQuery->where('is_atual', true)
                         ->where('perfil_id', 7); // Ajuste para o perfil desejado
            });
        })
        ->with('user')
        ->paginate(10);
        
        return view('director.students.index', compact('user', 'userOrganization', 'profiles', 'org'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('director.students.create', compact('user'));
    }



    public function store(Request $request)
    {
        $user = Auth::user();

        $organization = UserOrganizationModel::where('user_id', $user->id)->first();

        $student = User::create([
            'name' => $request->student_name,
            'email' => $request->student_email,
            'password' => bcrypt(123456789),
            'whatsapp' => $request->student_whatsapp,
            'cpf' => $request->cpf,
            'birthdate' => $request->student_birthdate,
            // 'cep' => $request->student_cep,
            // 'address' => $request->student_address,
            // 'city' => $request->student_city,
            // 'state' => $request->student_state,
            // 'number' => $request->student_number,
            'is_emancipated' => $request->emancipated == 'yes' ? true : false,
        ]);

        $student->perfis()->attach(7, ['is_atual' => true, 'status' => 1]);

        $student->organizations()->attach($organization->organization->id);

        $responsible = User::create([
            'name'           => $request->name,
            'email'          => $request->email,
            'password'       => Hash::make(123456789),
            'whatsapp'       => $request->whatsapp,
        ]);

        $responsible->organizations()->attach($organization->organization->id);

        $responsible->perfis()->attach(6, ['is_atual' => true, 'status' => 1]);

        StudentResponsible::create([
            'id_student' => $student->id,
            'id_responsible' => $responsible->id,
            'responsible_type_id' => 1,
            'status' => true,
        ]);
       
        return redirect()->route('director.students.index')->with('success', 'Aluno adicionado com sucesso!');
    }

    public function getPreRegister(){

        $user = Auth::user();
        $org = UserOrganizationModel::where('user_id', $user->id)->first();
        $students = StudentInputsModel::orderBy('id', 'desc')->paginate(7);

        return view('director.students.pre-register', compact('user', 'students', 'org'));
    }
    public function postPreRegister(PreRegisterRequest $request)
    {
        // Remove pontos e traços antes da validação
        $cpfLimpo = preg_replace('/\D/', '', $request->cpf); 

        // Verifica se o CPF já existe no banco
        if (StudentInputsModel::where('cpf', $cpfLimpo)->exists()) {
            return redirect()->back()->withErrors(['cpf' => 'Este CPF já está cadastrado.'])->withInput();
        }

        $request->validate([
            'cpf' => 'required|string|size:14',
        ], [
            'cpf.required' => 'O CPF é obrigatório.',
            'cpf.size' => 'O CPF deve ter 14 caracteres (formato: XXX.XXX.XXX-XX).',
        ]);

        $user = Auth::user();
        $org = UserOrganizationModel::where('user_id', $user->id)->first();

        StudentInputsModel::create([
            'cpf' => $cpfLimpo,
            'password' => bcrypt($cpfLimpo), // Senha usando CPF sem pontuação (agora criptografado)
            'status' => 1,
            'organization_id' => $org->organization_id,
            'user_id' => $user->id
        ]);

        return redirect()->route('director.pre-register.get')->with('success', 'Cpf registrado com sucesso!');
    }

    public function deletePreRegister($id)
    {
        $student = StudentInputsModel::find($id);
        $student->delete();

        return redirect()->route('director.pre-register.get')->with('success', 'Pré-cadastro deletado com sucesso!');
    }

    public function uploadCpf(Request $request){
    // Verifica se o arquivo foi enviado
    if ($request->hasFile('file')) {
        // Pega o arquivo enviado
        $file = $request->file('file');

        // Garante que o diretório temp exista
        $directory = storage_path('app/temp');
        if (!file_exists($directory)) {
            mkdir($directory, 0777, true);  // Cria o diretório se não existir
        }

        // Define o nome do arquivo para salvar
        $fileName = 'cpfs.xlsx'; 

        // Move o arquivo para o diretório correto
        $file->move($directory, $fileName);

        // Agora, tente importar o arquivo usando o caminho correto
        try {
            // Use o caminho completo para o arquivo
            Excel::import(new CpfImport, storage_path('app/temp/' . $fileName));
            return redirect()->back()->with('success', 'CPFs importados com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    return redirect()->back()->withErrors(['error' => 'Nenhum arquivo enviado']);
}
    



}