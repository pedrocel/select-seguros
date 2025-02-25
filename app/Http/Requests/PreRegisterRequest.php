<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\StudentInputsModel;

class PreRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'cpf' => [
                'required',
                'string',
                Rule::unique('student_inputs', 'cpf'), // Garante que o CPF seja único
                function ($attribute, $value, $fail) {
                    if (!$this->validaCPF($value)) {
                        $fail('O CPF informado é inválido.');
                    }
                },
            ],
        ];
    }

    /**
     * Mensagens personalizadas para os erros de validação.
     */
    public function messages(): array
    {
        return [
            'cpf.required' => 'O CPF é obrigatório.',
            'cpf.regex' => 'O CPF deve conter apenas números.',
            'cpf.unique' => 'Este CPF já está cadastrado.',
        ];
    }

    /**
     * Função para validar CPF
     */
    private function validaCPF(string $cpf): bool
    {
        // Remove caracteres não numéricos
        $cpf = preg_replace('/\D/', '', $cpf);

        // Elimina CPFs inválidos conhecidos
        if (preg_match('/^(\d)\1{10}$/', $cpf)) return false;

        // Validação dos dígitos verificadores
        for ($t = 9; $t < 11; $t++) {
            $d = 0;
            for ($c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$t] != $d) return false;
        }

        return true;
    }
}
