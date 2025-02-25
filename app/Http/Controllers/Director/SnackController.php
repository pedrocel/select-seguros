<?php

namespace App\Http\Controllers\Director;

use App\Http\Controllers\Controller;
use App\Models\FaceEvent;
use App\Models\User;
use App\Models\UserOrganizationModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Sum;

class SnackController extends Controller
{
    public function getDashboard()
    {
        $user = Auth::user();

        $org = UserOrganizationModel::where('user_id', $user->id)->first();

        $today = Carbon::today();

        // Ajustando os horários com fuso horário (-3h)
        $morning = FaceEvent::whereBetween('timestamp', [
                $today->copy()->setHour(7), 
                $today->copy()->setHour(9)
            ])
            ->where('event', 'entrada')
            ->count();

        $afternoon = FaceEvent::whereBetween('timestamp', [
                $today->copy()->setHour(12),
                $today->copy()->setHour(14)
            ])
            ->where('event', 'entrada')
            ->count();

        $evening = FaceEvent::whereBetween('timestamp', [
                $today->copy()->setHour(18),
                $today->copy()->setHour(20)
            ])
            ->where('event', 'entrada')
            ->count();

        $total = $morning + $afternoon + $evening;

        $faceEvents = FaceEvent::orderBy('id', 'desc')->paginate(5);

        $linkedUsers = User::paginate(5);

        return view('director.snack.dashboard', compact('morning', 'afternoon', 'evening', 'org', 'faceEvents', 'total', 'linkedUsers'));
    }

}
