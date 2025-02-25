<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DocumentType;

class DocumentTypeController extends Controller
{
    public function index()
    {
        $documents = DocumentType::all();

        return response()->json($documents, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'is_required' => 'required|boolean',
        ]);

        $type = DocumentType::create($request->all());

        return response()->json($type, 201);
    }

    public function update(Request $request, DocumentType $documentType)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'is_required' => 'sometimes|required|boolean',
        ]);

        $documentType->update($request->all());

        return response()->json($documentType);
    }

    public function destroy(DocumentType $documentType)
    {
        $documentType->delete();

        return response()->json(['message' => 'Tipo de documento excluído com sucesso']);
    }
}
