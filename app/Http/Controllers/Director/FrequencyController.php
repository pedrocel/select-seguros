<?php

namespace App\Http\Controllers\Director;

use App\Http\Controllers\Controller;
use App\Models\FaceEvent;
use App\Models\UserOrganizationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrequencyController extends Controller
{
    public function getDashboard(Request $request)
{
    $user = Auth::user();
    $org = UserOrganizationModel::where('user_id', $user->id)->first();


    // Filtros
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');
    $eventType = $request->input('event'); // 'entrada' ou 'saida'

    // Consulta base
    $query = FaceEvent::where('name', "!=", null)->orderBy('created_at', 'desc');

    $querys = FaceEvent::
    orderBy('id', 'desc')->paginate(20);

    // Aplicar filtros
    if ($startDate) {
        $query->where('created_at', '>=', $startDate);
    }
    if ($endDate) {
        $query->where('created_at', '<=', $endDate . ' 23:59:59');
    }
    if ($eventType) {
        $query->where('event', $eventType);
    }

    // Dados para os indicadores
    $totalStudents = UserOrganizationModel::where('organization_id', $org->organization_id)->count();
    $presentStudents = $query->distinct('user_id')->count('user_id');
    $absentStudents = $totalStudents - $presentStudents;

    return view('director.frequency.dashboard', compact(
        'org',
        'totalStudents',
        'presentStudents',
        'absentStudents',
        'querys'
    ));
}


private function getEntryExitData($organizationId, $startDate, $endDate)
{
    return DB::table('face_events')
             ->select('event', DB::raw('COUNT(*) as total'))
             ->where('organization_id', $organizationId)
             ->when($startDate, function ($query, $startDate) {
                 return $query->where('created_at', '>=', $startDate);
             })
             ->when($endDate, function ($query, $endDate) {
                 return $query->where('created_at', '<=', $endDate . ' 23:59:59');
             })
             ->groupBy('event')
             ->get();
}

private function getAttendanceOverTime($organizationId, $startDate, $endDate, $eventType)
{
    return DB::table('face_events')
             ->select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(DISTINCT user_id) as total'))
             ->where('organization_id', $organizationId)
             ->when($startDate, function ($query, $startDate) {
                 return $query->where('created_at', '>=', $startDate);
             })
             ->when($endDate, function ($query, $endDate) {
                 return $query->where('created_at', '<=', $endDate . ' 23:59:59');
             })
             ->when($eventType, function ($query, $eventType) {
                 return $query->where('event', $eventType);
             })
             ->groupBy('date')
             ->orderBy('date')
             ->get();
}
}
