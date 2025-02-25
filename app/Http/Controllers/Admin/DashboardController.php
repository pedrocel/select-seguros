<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrganizationModel;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $organizacoes = OrganizationModel::all(); // Exemplo: obtendo todas as organizações
        $alunosTotal = User::count(); // Exemplo: quantidade total de alunos

    return view('admin.dashboard', compact('organizacoes', 'alunosTotal'));
    }
}
