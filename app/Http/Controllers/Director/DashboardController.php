<?php

namespace App\Http\Controllers\Director;

use App\Http\Controllers\Controller;
use App\Models\FaceEvent;
use App\Models\PerfilModel;
use App\Models\UserOrganizationModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
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
        ->get();

        $biometrias = UserOrganizationModel::where('organization_id', $org->organization_id)
        ->whereHas('user', function ($query) {
            // Filtro para obter apenas os usuários com perfilAtual igual a 7
            $query->whereHas('perfis', function ($subQuery) {
                $subQuery->where('is_atual', true)
                        ->where('perfil_id', 7); // Ajuste para o perfil desejado
            })
            ->whereNotNull('facial_image_base64'); // Filtra usuários com facial_image_base64 diferente de null
        })
        ->with('user')
        ->get();

        // Calcula a porcentagem de usuários com biometria cadastrada
        $totalUsuarios = $userOrganization->count();
        $totalBiometria = $biometrias->count();
        
        $percentualBiometria = $totalUsuarios > 0 ? ($totalBiometria / $totalUsuarios) * 100 : 0;

        $acessosHoje = FaceEvent::where('organization_id', $org->organization_id)
        ->whereDate('created_at', Carbon::today()) // Filtra apenas os registros do dia atual
        ->get();

        $totalAcessosHoje = $acessosHoje->count();

        // Calcula a porcentagem de acessos hoje em relação aos que têm biometria cadastrada
        $percentualAcessosHoje = $totalBiometria > 0 ? ($totalAcessosHoje / $totalBiometria) * 100 : 0;

        // Obtém os acessos dos últimos 30 dias agrupados por dia
        $acessosUltimos30Dias = FaceEvent::where('organization_id', $org->organization_id)
        ->whereBetween('created_at', [Carbon::today()->subDays(30), Carbon::today()])
        ->select(DB::raw('DATE(created_at) as data'), DB::raw('COUNT(*) as total'))
        ->groupBy(DB::raw('DATE(created_at)'))
        ->get();
        
        // Calcula a média diária de acessos nos últimos 30 dias
        $diasComRegistro = $acessosUltimos30Dias->count(); // Número de dias que tiveram acessos
        $totalAcessos30Dias = $acessosUltimos30Dias->sum('total'); // Total de acessos nesses dias

        // Média de presença diária considerando os últimos 30 dias
        $mediaPresenca30Dias = ($diasComRegistro > 0 && $totalBiometria > 0) 
            ? ($totalAcessos30Dias / ($diasComRegistro * $totalBiometria)) * 100 
            : 0;

        return view('director.dashboard', compact('user', 'userOrganization', 'profiles', 'org', 'biometrias', 'percentualBiometria', 'acessosHoje', 'percentualAcessosHoje', 'mediaPresenca30Dias'));   
    }

    public function getVendas(){
        return view ('director.reports.vendas');
    }
}