<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFacial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'email', 
        'cpf', 
        'user_control_id', 
        'user_intelbras_id', 
        'user_hakvision_id',
        'facial_image_base64',
        'status',
    ];
}
