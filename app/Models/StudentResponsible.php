<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentResponsible extends Model
{
    use HasFactory;

    protected $table = 'student_responsible';

    protected $fillable = [
        'id_student',
        'id_responsible',
        'responsible_type_id',
        'status',
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'id_student');
    }

    public function responsible()
    {
        return $this->belongsTo(User::class, 'id_responsible');
    }
}
