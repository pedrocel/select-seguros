<?php

namespace App\Imports;

use App\Models\StudentInputsModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Support\Facades\Validator;
use App\Rules\CpfValidation; // Não se esqueça de importar a regra personalizada

class CpfImport implements ToCollection
{
    use Importable;

    public function collection(Collection $rows)
    {
        $errores = [];
        $sucesso = 0;

        foreach ($rows as $row) {
            $cpf = $row[0]; // Supondo que o CPF esteja na primeira coluna

            // Remove máscara de CPF e valida
            $cpfLimpo = preg_replace('/\D/', '', $cpf);

            // Validação do CPF com a regra personalizada
            $validator = Validator::make(['cpf' => $cpfLimpo], [
                'cpf' => ['required', 'string', 'size:11', new CpfValidation], // Usa a regra personalizada
            ]);

            if ($validator->fails()) {
                $errores[] = $cpf;
                continue;
            }

            if (StudentInputsModel::where('cpf', $cpfLimpo)->exists()) {
                continue;
            }

            StudentInputsModel::create([
                'cpf' => $cpfLimpo,
                'password' => bcrypt($cpfLimpo),
                'status' => 1,
            ]);

            $sucesso++;
        }

        // Lida com os resultados e erros
        if ($errores) {
            return response()->json([
                'success' => "$sucesso CPFs cadastrados com sucesso!",
                'error' => "Os seguintes CPFs falharam: " . implode(", ", $errores),
            ]);
        } else {
            return response()->json([
                'success' => "$sucesso CPFs cadastrados com sucesso!",
            ]);
        }
    }
}
