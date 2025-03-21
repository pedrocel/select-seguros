<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class CotationController extends Controller
{
    private $apiUrl = 'https://hmlapi.splitrisk.com.br';
    private $apiKey = '560c55ee-236f-401f-88f7-3c0744f1b06e';
    private $apiSecret = 'dc992af8-2d55-41d4-8e2f-a6f5585249d5';

    public function authenticate()
    {
        $response = Http::post("{$this->apiUrl}/api-auth", [
            'apikey' => $this->apiKey,
            'apisecret' => $this->apiSecret,
        ]);

        if ($response->successful()) {
            $data = $response->json();
            if ($data['success']) {
                Cache::put('api_token', $data['token'], now()->addMinutes(55));
                return $data['token'];
            }
        }

        return response()->json(['error' => 'Falha na autenticação'], 401);
    }

    public function getBrands(Request $request)
    {
        $token = Cache::get('api_token') ?? $this->authenticate();
        if (!$token) {
            return response()->json(['error' => 'Não foi possível autenticar'], 401);
        }

        $type = $request->input('type', 1); // Agora pega do body
        $response = Http::withHeaders([
            'Authorization' => "$token",
        ])->post("{$this->apiUrl}/api/list-brands", [
            'type' => $type
        ]);

        if ($response->successful()) {
            return response()->json($response->json());
        }

        return response()->json(['error' => 'Erro ao buscar marcas'], $response->status());
    }

    public function getModels(Request $request)
    {
        $token = Cache::get('api_token') ?? $this->authenticate();
        if (!$token) {
            return response()->json(['error' => 'Não foi possível autenticar'], 401);
        }

        $type = $request->query('type', 1);
        $brandId = $request->query('id');

        if (!$brandId) {
            return response()->json(['error' => 'ID da marca é obrigatório'], 400);
        }

        $response = Http::withHeaders([
            'Authorization' => "$token",
        ])->post("{$this->apiUrl}/api/list-models", [
            'type' => $type,
            'brand' => $brandId
        ]);

        if ($response->successful()) {
            return response()->json($response->json());
        }

        return response()->json(['error' => 'Erro ao buscar modelos'], $response->status());
    }

    public function getVersions(Request $request)
    {
        $token = Cache::get('api_token') ?? $this->authenticate();
        if (!$token) {
            return response()->json(['error' => 'Não foi possível autenticar'], 401);
        }

        $response = Http::withHeaders([
            'Authorization' => "$token",
        ])->post("{$this->apiUrl}/api/list-versions", [
            'type' => $request->type,
            'brand' => $request->brand,
            'model' => $request->model
        ]);

        if ($response->successful()) {
            return response()->json($response->json());
        }

        return response()->json(['error' => 'Erro ao buscar versões'], $response->status());
    }

    

    public function getCoverage($fipe_code, $brand, $value)
{
    $token = Cache::get('api_token') ?? $this->authenticate();
    if (!$token) {
        return response()->json(['error' => 'Não foi possível autenticar'], 401);
    }

    $endpoints = [
        'basic' => "{$this->apiUrl}/quotation/get-basic-coverage",
        'support' => "{$this->apiUrl}/quotation/get-support-coverage",
        'replacement_car' => "{$this->apiUrl}/quotation/get-replacement-car-coverage",
        'glass' => "{$this->apiUrl}/quotation/get-glass-coverage",
        'optional' => "{$this->apiUrl}/quotation/get-optional-coverage",
        'fipe_lmi' => "{$this->apiUrl}/quotation/get-fipe-lmi-coverage",
        'deductible' => "{$this->apiUrl}/quotation/get-deductible-coverage"
    ];

    $payloads = [
        'basic' => ['fipe_code' => $fipe_code, 'brand' => $brand, 'value' => $value],
        'support' => ['type_vehicle' => 1, 'value' => $value],
        'replacement_car' => ['type_vehicle' => 1, 'value' => $value],
        'glass' => ['type_vehicle' => 1, 'value' => $value],
        'optional' => ['type_vehicle' => 1, 'value' => $value],
        'fipe_lmi' => ['type_vehicle' => 1, 'value' => $value],
        'deductible' => ['type_vehicle' => 1, 'value' => $value]
    ];

    $headers = ['Authorization' => $token];
    $results = [];

    foreach ($endpoints as $key => $url) {
        $response = Http::withHeaders($headers)->post($url, $payloads[$key]);

        if ($response->successful()) {
            $results[$key] = $response->json();
        } else {
            $results[$key] = ['error' => 'Falha na requisição'];
        }
    }

    return response()->json($results);
}

public function getFipeValue(Request $request)
    {
        $token = Cache::get('api_token') ?? $this->authenticate();
        if (!$token) {
            return response()->json(['error' => 'Não foi possível autenticar'], 401);
        }

        $type = $request->type;
        $brand = $request->brand;
        $model = $request->model;
        $yearModel = explode('-', $request->version)[0];


        // Extrair o combustível (assumindo que o combustível está sempre depois do ano e de um espaço)
        $versionParts = explode(' ', $request->versionLabel);

        if (isset($versionParts[1])) {
            $fuelLabel = $versionParts[1];  // O combustível está na segunda parte (índice 1)
            
            switch ($fuelLabel) {
                case 'Gasolina':
                    $fuel = 1;
                    break;
                case 'Álcool':
                    $fuel = 2;
                    break;
                case 'Diesel':
                    $fuel = 3;
                    break;
                default:
                    $fuel = null; // Caso não seja Gasolina, Álcool ou Diesel
                    break;
            }
        } else {
            $fuel = null;  // Se não houver parte 1 (combustível), pode ser inválido
        }

        $data = [
            'type' =>  $type,
            'brand' =>   $brand,
            'model' =>  $model,
            'yearModel' =>  $yearModel,
            'fuel' =>  $fuel
        ];

        $response = Http::withHeaders([
            'Authorization' => "$token",
        ])->post("{$this->apiUrl}/api/get-fipe", $data);

        $fipeData = $response->json(); // Converte a resposta JSON para array

        if (!empty($fipeData) && isset($fipeData['fipe_code'], $fipeData['brand'], $fipeData['value'])) {
            // Chama a função de cobertura
            $coverageResponse = $this->getCoverage($fipeData['fipe_code'], $fipeData['brand'], $fipeData['value']);
            $coverage = json_decode($coverageResponse->getContent(), true); // Converte JSONResponse em array

            // Salva a cotação no banco de dados
            $quotation = Quotation::create([
                'fipe_code' => $fipeData['fipe_code'],
                'brand' => $fipeData['brand'],
                'model' => $fipeData['model'],
                'year' => $fipeData['year'],
                'value' => $fipeData['value'] ,
                'fuel' => $fipeData['fuel'],
                'name' => $request->name,
                'whatsapp' => $request->whatsapp,
                'coverage' => $coverage
            ]);

            // Redireciona para a rota 'coverage' passando o ID da cotação
            return response()->json([
                'message' => 'Cotação realizada com sucesso!',
                'vehicle' => $fipeData,
                'fipe' => $coverage,
                'redirect_url' => route('coverage', ['id' => $quotation->id]) // Redireciona para a rota 'coverage'
            ], 200);
        } else {
            return response()->json(['error' => 'Dados da FIPE inválidos'], 400);
        }

        
    }

    public function getCoveragePage($id)
    {
        $quotation = Quotation::findOrFail($id);

        return view('coberturas', [
            'quotation' => $quotation,
        ]);
    }

    public function getContractPages(Request $request){

        $quotation = Quotation::findOrFail($request->quotationId);

        return response()->json([
            'quotation' => $quotation,
            'redirect_url' =>  route('checkout', ['id' => $quotation->id]) // Redireciona para a rota 'coverage'
        ], 200);
    }

    public function getCheckout($id)
    {
        $quotation = Quotation::findOrFail($id);

        return view('checkout', [
            'quotation' => $quotation,
        ]);
    }

    public function finishPayment(Request $request){
        
        return response()->json([
            'redirect_url' =>  route('get.finish') // Redireciona para a rota 'coverage'
        ], 200);
    }

    public function getFinishPayment(){
        return view('obrigado');
    }

}