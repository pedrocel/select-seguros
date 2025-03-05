<?php

namespace App\Http\Controllers;

use App\Models\LeadInput;
use Illuminate\Http\Request;

class LeadInputController extends Controller
{
    public function store(Request $request)
    {
        // Criando o Lead
        $lead = LeadInput::create([
            'nome' => $request->nome,
            'sobrenome' => $request->sobrenome,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'telefone' => $request->telefone,
            'marca_veiculo' => $request->marca_veiculo,
            'modelo_veiculo' => $request->modelo_veiculo,
            'ano_veiculo' => $request->ano_veiculo,
            'placa_veiculo' => $request->placa_veiculo,
            'quilometragem_veiculo' => $request->quilometragem_veiculo,
            'cep' => $request->cep,
            'rua' => $request->rua,
            'numero' => $request->numero,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'complemento' => $request->complemento,
            'status' => 1
        ]);

        // Retorna a resposta
        return response()->json([
            'success' => true,
            'message' => 'Lead criado com sucesso!',
            'data' => $lead
        ]);
    }
}
