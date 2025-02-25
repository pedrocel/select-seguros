<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaceEvent;
use App\Models\User;
use App\Models\UserFaceModel;
use App\Models\UserFacial;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Str;

class FaceEventController extends Controller
{
    public function handleWebhook(Request $request)
    {
        // Criação do evento facial
        FaceEvent::create([
            'name' => $request->input('name'),
            'image' => $request->input('image'),
            'event' => $request->input('event'),
            'timestamp' => $request->input('timestamp'),
            'user_id' => $request->input('user_id'),
            'external_id' => $request->input('external_id'),
            'organization_id' => $request->input('organization_id'),
            'group_id' => $request->input('group_id'),
            'data' => $request->input('data')
        ]);

        return response()->json(['message' => 'Face event created successfully'], 201);
    }

    public function getUsers(){
        return response()->json(UserFaceModel::all());
    }

    public function createFaltas(Request $request)
    {
        // Obtém o horário atual
        $today = Carbon::today();
        
        // Busca todos os usuários
        $users = User::all();

        // Loop para verificar os usuários
        foreach ($users as $user) {
            // Verifica se o usuário já tem um registro no dia de hoje na FaceEvent
            $hasRecordToday = FaceEvent::where('user_id', $user->id)
                ->whereDate('timestamp', $today)
                ->exists();

            // Se não tiver registro, cria um novo com evento 'falta'
            if (!$hasRecordToday) {
                FaceEvent::create([
                    'id' => (string) Str::uuid(), // Gera um UUID
                    'name' => $user->name, // Nome do usuário
                    'event' => 'falta', // Define o evento como 'falta'
                    'timestamp' => now(), // Horário atual
                    'user_id' => $user->id, // ID do usuário
                    'external_id' => null, // External ID pode ser null
                    'organization_id' => $user->organization_id, // Supondo que você tenha essa relação
                    'group_id' => $user->group_id, // ID do grupo
                    'data' => json_encode(['info' => 'Falta registrada no sistema por:']), // Dados extras
                ]);
            }
        }

        return response()->json(['message' => 'Faltas registradas para usuários ausentes no dia de hoje.'], 200);
    }
}