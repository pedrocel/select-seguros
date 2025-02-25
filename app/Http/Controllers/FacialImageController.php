<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class FacialImageController extends Controller
{
    public function updateFacialImage(Request $request)
    {
        // Validação da requisição
        $validated = $request->validate([
            'facial_image_base64' => 'required|string',
        ]);

        // Obtém o usuário autenticado
        $user = Auth::user();

        if (!$user) {
            return response()->json(['message' => 'Usuário não autenticado'], 401);
        }

        // Atualiza os dados do usuário
        $user->facial_image_base64 = $validated['facial_image_base64'];
        $user->status = 3; 

        //Status 3 = Cadastro de Biometria Facial Pendente
        
        $user->save();

        return response()->json([
            'message' => 'Imagem facial e status atualizados com sucesso.',
            'user' => $user
        ], 200);
    }

    public function updateFacialImageAdm(Request $request, $userId)
    {

        $user = User::where('id', $userId)->first();

        if (!$user) {
            return response()->json(['message' => 'Usuário não autenticado'], 401);
        }

        // Atualiza os dados do usuário
        $user->facial_image_base64 = $request['facial_image_base64'];
        $user->status = 3; 

        $user->save();

        return response()->json([
            'message' => 'Imagem facial e status atualizados com sucesso.',
            'user' => $user
        ], 200);
    }

    public function approveFacial($id)
    {
        $user = User::where('id', $id)->first();

        if (!$user) {
            return response()->json(['message' => 'Usuário não autenticado'], 401);
        }

        $user->status = 4; //Status Aprovado = Ativo
        $user->save();

        return redirect()->route('admin.users.show', $user)->with('success', 'Biometria Facial aprovada com sucesso!');
    }

    public function reprove($id)
    {
        $user = User::where('id', $id)->first();

        if (!$user) {
            return response()->json(['message' => 'Usuário não autenticado'], 401);
        }

        $user->status = 3; //Status reprovado = Cadastro de Biometria Facial Pendente
        $user->save();

        return redirect()->route('admin.users.show', $user)->with('success', 'Biometria Facial reprovada com sucesso!');
    }
}
