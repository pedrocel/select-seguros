<?php

namespace App\Http\Controllers\Director;

use App\Http\Controllers\Controller;
use App\Models\Turma;
use App\Models\TurmaModel;
use App\Models\UserProfessor;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    public function index()
    {
        $turmas = TurmaModel::with(['contexto', 'professores'])->get();
        return response()->json($turmas);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'organization_id' => 'nullable|uuid',
            'nome' => 'required|string|max:255',
            'periodo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'contexto_id' => 'required|exists:contextos,id',
            'professores' => 'nullable|array', 
            'professores.*' => 'exists:user_professores,id' // IDs de professores
        ]);

        $turma = TurmaModel::create($validated);
        
        if (isset($validated['professores'])) {
            $turma->professores()->attach($validated['professores']);
        }

        return response()->json(['message' => 'Turma criada com sucesso!', 'turma' => $turma], 201);
    }

    public function show($id)
    {
        $turma = TurmaModel::with(['contexto', 'professores'])->findOrFail($id);
        return response()->json($turma);
    }

    public function update(Request $request, $id)
    {
        $turma = TurmaModel::findOrFail($id);

        $validated = $request->validate([
            'organization_id' => 'nullable|uuid',
            'nome' => 'required|string|max:255',
            'periodo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'contexto_id' => 'required|exists:contextos,id',
            'professores' => 'nullable|array',
            'professores.*' => 'exists:user_professores,id'
        ]);

        $turma->update($validated);
        
        if (isset($validated['professores'])) {
            $turma->professores()->sync($validated['professores']);
        }

        return response()->json(['message' => 'Turma atualizada com sucesso!', 'turma' => $turma]);
    }

    public function destroy($id)
    {
        $turma = TurmaModel::findOrFail($id);
        $turma->delete();

        return response()->json(['message' => 'Turma excluída com sucesso!']);
    }
}
