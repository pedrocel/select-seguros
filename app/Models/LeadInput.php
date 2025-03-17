<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadInput extends Model
{
    use HasFactory;

    // Definir os campos que podem ser preenchidos via mass-assignment
    protected $fillable = [
        'nome',
        'email',
        'cpf',
        'whatsapp',
        'marca_veiculo',
        'modelo_veiculo',
        'ano_veiculo',
        'placa_veiculo',
        'quilometragem_veiculo',
        'cep',
        'rua',
        'numero',
        'bairro',
        'cidade',
        'complemento',
        'user_id',
        'status',
        'ip',
        'user_agent',
        'referal',
    ];

    // Caso precise de timestamps personalizados, descomente a linha abaixo
    // public $timestamps = false; // Se não usar a coluna created_at / updated_at
}
