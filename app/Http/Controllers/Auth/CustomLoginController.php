<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\OrganizationModel;
use App\Models\StudentInputsModel;
use Illuminate\Http\Request;
use App\Models\StudentInput;
use App\Models\User;
use App\Models\UserOrganizationModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('student.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'cpf' => 'required|string',
            'password' => 'required|string',
        ]);

        $cleanedCpf = str_replace(['.', '-'], '', $request->cpf);

        $student = StudentInputsModel::where('cpf', $cleanedCpf)->first();

        if ($student && Hash::check($request->password, $student->password)) {

            if($student->status == 0) {
                $user = User::where('cpf', $cleanedCpf)->first();
                
                if($user) {
                    Auth::login($user);
                    return redirect()->route('student.dashboard')->with('success', 'Cadastro realizado com sucesso!');
                }
                return back()->withErrors(['cpf' => 'Entre em contato com o administrador para liberar o seu cadastro.']);
            }
            // Se o CPF e a senha estiverem corretos, redirecione para a tela de cadastro
            return redirect()->route('student.register.get', $student->cpf);
        }

        // Se o CPF não existir ou a senha estiver incorreta, retorne com uma mensagem de erro
        return back()->withErrors(['cpf' => 'CPF ou senha incorretos.']);
    }

    public function showRegisterForm($cpf)
    {
        $student = StudentInputsModel::where('cpf', $cpf)->first();
        $organization = OrganizationModel::where('id', $student->organization_id)->first();

        return view('student.register', compact('student', 'organization'));
    }

    public function register(Request $request)
    {

        $student = User::create([
            'name' => $request->student_name,
            'email' => $request->student_email,
            'password' => bcrypt($request->student_password),
            'whatsapp' => $request->student_whatsapp,
            'cpf' => $request->cpf,
            'birthdate' => $request->student_birthdate,
            'cep' => $request->student_cep,
            'address' => $request->student_address,
            'city' => $request->student_city,
            'state' => $request->student_state,
            'number' => $request->student_number,
            'is_emancipated' => $request->emancipated == 'yes' ? true : false,
        ]);

        $student->perfis()->attach(7, ['is_atual' => true, 'status' => 1]);

        $student->organizations()->attach($request->id_organization);

        StudentInputsModel::where('cpf', $student->cpf)->update(['status' => 0]);

        Auth::login($student);

        return redirect()->route('student.dashboard')->with('success', 'Cadastro realizado com sucesso!');
    }
}