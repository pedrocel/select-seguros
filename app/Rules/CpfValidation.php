<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CpfValidation implements Rule
{
    /**
     * Determina se o CPF é válido.
     *
     * @param  string  $cpf
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Remove caracteres não numéricos
        $cpf = preg_replace('/\D/', '', $value);

        // Verifica se é um CPF genérico (exemplo: 111.111.111-11)
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Validação dos dígitos verificadores
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }

        return true;
    }

    /**
     * Obtenha a mensagem de erro.
     *
     * @return string
     */
    public function message()
    {
        return 'O CPF informado é inválido.';
    }
}
