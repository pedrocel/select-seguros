<?php

namespace App\Http\Controllers\Responsible;

use App\Http\Controllers\Controller;
use App\Models\OrganizationModel;
use App\Models\StudentResponsible;
use App\Models\User;
use App\Models\UserOrganizationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $students = StudentResponsible::where('id_responsible', Auth::id())
            ->with('student:id,name,email,facial_image_base64') // Carrega apenas os campos necessários
            ->get();

        return view('responsible.student.index', compact('students', 'user'));
    }

    public function store(Request $request){
        
        $user = Auth::user();
        $organization = UserOrganizationModel::where('user_id', $user->id)->first();
        $student = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'whatsapp'       => $request->whatsapp,
            'cpf'            => $request->cpf,
            'birth_date'     => $request->birth_date,
            'is_emancipated' => $request->has('is_emancipated'),
        ]);

        // Relacionamento com o perfil de aluno
        $student->perfis()->attach(7, ['is_atual' => true, 'status' => 1]);

        // Relacionamento com a organização
        $student->organizations()->attach($organization->id);

        // Relacionamento com o responsável
        StudentResponsible::create([
            'id_student' => $student->id,
            'id_responsible' => $user->id,
            'responsible_type_id' => 1, // Defina o tipo de responsável conforme necessário
            'status' => true,
        ]);

        return redirect()->route('responsible.students.index')->with('success', 'Aluno adicionado com sucesso!');
    }
}
