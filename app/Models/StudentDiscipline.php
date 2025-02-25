<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentDiscipline extends Model
{
    use HasFactory;

    protected $table = 'student_discipline';

    protected $fillable = [
        'id_student',
        'id_discipline',
        'status',
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'id_student');
    }

    public function discipline()
    {
        return $this->belongsTo(Discipline::class, 'id_discipline');
    }
}
