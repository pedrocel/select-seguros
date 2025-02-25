<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class CalendarController extends Controller
{
    public function index()
    {
        $user = FacadesAuth::user();
        return view('student.calendar.index', compact('user'));
    }
}
