<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TurmaModel extends Model
{
    use HasFactory;

    protected $fillable = ['organization_id', 'nome', 'periodo', 'descricao', 'contexto_id', 'professor_id'];

    public function contexto()
    {
        return $this->belongsTo(ContextoModel::class);
    }

    public function professores()
    {
        return $this->belongsToMany(UserProfessorModel::class, 'turma_professor');
    }

}
