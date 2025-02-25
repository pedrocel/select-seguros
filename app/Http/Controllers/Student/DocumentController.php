<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\DocumentType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $documentTypes = DocumentType::all();

        $requiredDocumentTypes = DocumentType::where('is_required', true)->get();

        $documents = [];

        foreach ($requiredDocumentTypes as $documentType) {
            $document = Document::where('document_type_id', $documentType->id)
                ->where('student_id', Auth::user()->id)
                ->first();
            
            $documents[] = [
                'id' => $document ? $document->id : null,
                'document_type' => $documentType,
                'file_path' => $document ? $document->file_path : null,
                'status' => $document ? $document->status : 'not_env'
            ];
        }
        
        return view('student.documents.index', compact('documents', 'user'));
    }

    public function store(Request $request, $id_type, User $user)
    {
        $filePath = $request->file('file')->store('/documents');
        // Criar o documento no banco de dados
        Document::create([
            'document_type_id' => $id_type,
            'student_id' => $user->id, // Certifique-se de usar o ID do usuário autenticado
            'file_path' => $filePath,
            'status' => 1, // 1 enviado aguardando validação, 2 aprovado, 3 reprovado
        ]);

        return redirect()->back()->with('success', 'Documento enviado com sucesso');
    }

    public function download($id)
    {
        $document = Document::findOrFail($id);

        if (Storage::exists($document->file_path)) {
            return Storage::download($document->file_path);
        }

        return redirect()->back()->with('error', 'Arquivo não encontrado.');
    }
}
