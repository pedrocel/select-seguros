<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContextoModel extends Model
{
    use HasFactory;
    
    protected $table = 'contexto';

    protected $fillable = ['organization_id', 'ano_letivo', 'descricao'];

    public function turmas()
    {
        return $this->hasMany(TurmaModel::class);
    }
}
