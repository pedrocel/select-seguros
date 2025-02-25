<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\FaceEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrequencyController extends Controller
{
    public function index(){
        $user = Auth::user();
        $faceEvents = FaceEvent::where('user_id', $user->id)->get();
        return view('student.frequency.index', compact('user', 'faceEvents'));
    }
}
