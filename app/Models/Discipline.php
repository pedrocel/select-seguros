<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    use HasFactory;

    protected $table = 'disciplines';

    protected $fillable = [
        'id_class',
        'type',
        'name',
        'id_teacher',
        'status',
        'qtd_students',
    ];

    public function class()
    {
        return $this->belongsTo(Classes::class, 'id_class');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'id_teacher');
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'student_discipline', 'id_discipline', 'id_student')
                    ->wherePivot('status', true); // Exemplo de filtro opcional
    }
}
