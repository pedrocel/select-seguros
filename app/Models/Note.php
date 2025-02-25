<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $table = 'notes';

    protected $fillable = [
        'id_student',
        'id_discipline',
        'value',
        'type',
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
