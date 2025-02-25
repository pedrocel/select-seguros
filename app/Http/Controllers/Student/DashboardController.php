<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\UserOrganizationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $organizacao = UserOrganizationModel::where('user_id', Auth::user()->id)->with('organization')->first();
        $org = UserOrganizationModel::where('user_id', Auth::user()->id)->with('organization')->first();
        $user = Auth::user();

        if(!$user->facial_image_base64){
            return view('student.profile.index', compact('user', 'organizacao', 'org'));
        }else{
            return view('student.dashboard', compact('user', 'organizacao', 'org'));
        }
    }
}
