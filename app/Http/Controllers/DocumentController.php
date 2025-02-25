<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document; // Certifique-se de importar o modelo
use App\Models\DocumentType;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function store(Request $request, $id_type, User $user)
    {

        // Armazenar o arquivo
        $filePath = $request->file('file')->store('/documents');

        // Criar o documento no banco de dados
        $document = Document::create([
            'document_type_id' => $id_type,
            'student_id' => $user->id, // Certifique-se de usar o ID do usuário autenticado
            'file_path' => $filePath,
            'status' => 1, // 1 enviado aguardando validação, 2 aprovado, 3 reprovado
        ]);

        return redirect()->back()->with('success', 'Documento enviado com sucesso');
    }

    public function listDocuments()
    {
        // Obter os tipos de documentos obrigatórios
        $requiredDocumentTypes = DocumentType::where('is_required', true)->get();

        // Inicializar as listas de documentos enviados e não enviados
        $sentDocuments = [];
        $pendingDocuments = [];

        foreach ($requiredDocumentTypes as $documentType) {
            // Verificar se o usuário já enviou o documento para esse tipo
            $document = Document::where('document_type_id', $documentType->id)
                ->where('student_id', Auth::user()->id)
                ->first();
            
            // Se o documento foi enviado (existe registro)
            if ($document) {
                // Adicionar documento à lista de enviados, mantendo o status
                $sentDocuments[] = [
                    'document_type' => $documentType,
                    'file_path' => $document->file_path,
                    'status' => $document->status // Usando a coluna status
                ];
            } else {
                // Se o documento não foi enviado (não existe registro)
                $pendingDocuments[] = [
                    'document_type' => $documentType,
                    'status' => 'not_env'
                ];
            }
        }

        // Unir as duas listas: documentos enviados e documentos pendentes
        $allDocuments = array_merge($sentDocuments, $pendingDocuments);

        return response()->json([
            'documents' => $allDocuments
        ]);
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
