<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentInputsModel extends Model
{
    protected $table = 'student_inputs';

    protected $fillable = [
        'cpf',
        'password',
        'status',
        'organization_id',
        'user_id',
    ];
 
    protected $hidden = [
        'password',
    ];
}
