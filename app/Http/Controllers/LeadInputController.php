<?php

namespace App\Http\Controllers;

use App\Models\LeadInput;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

class LeadInputController extends Controller
{
    public function store(Request $request)
    {
        $telefone = preg_replace('/\D/', '', $request->telefone);

        // Adicionar o código do país (55 para o Brasil)
        $telefone = '55' . $telefone;
        // Criando o Lead
        $lead = LeadInput::create([
            'nome' => $request->nome,
            'sobrenome' => $request->sobrenome,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'telefone' => $telefone,
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

        $this->sendWhatsApp($telefone, $request->nome);

        // Retorna a resposta
        return response()->json([
            'success' => true,
            'message' => 'Lead criado com sucesso!',
            'data' => $lead
        ]);
    }

    protected function sendWhatsApp($telefone, $nome)
    {
        try {
            $client = new Client();

            // Configurações da API do ChatPro
            $instanceId = 'chatpro-1aors879o7';
            $token = '66rvryi9wasim03a63ljr8cmyloby8';
            $url = "https://v5.chatpro.com.br/{$instanceId}/api/v1/send_message";

            // Faz a requisição para a API do ChatPro
            $response = $client->request('POST', $url, [
                'json' => [
                    'number' => $telefone, // Número do usuário no formato internacional
                    'message' => 'Olá '.$nome.', Tudo bem com você? recebemos seu interesse em contratar nosso seguro, em alguns instantes entraremos em contato para finalizar sua contratação.', // Mensagem da notificação
                ],
                'headers' => [
                    'Authorization' => $token, // Adiciona o prefixo Bearer
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ],
            ]);
        } catch (RequestException $e) {
            // Captura erros de requisição
            if ($e->hasResponse()) {
                $response = $e->getResponse();
                $errorMessage = "Erro ao enviar WhatsApp para  " . $response->getStatusCode() . " - " . $response->getBody();
            } else {
                $errorMessage = "Erro ao enviar WhatsApp para  " . $e->getMessage();
            }
           
        }
    }
}
