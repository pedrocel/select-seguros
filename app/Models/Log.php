<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_control_id',
        'user_facial_id',
        'time',
        'event',
        'device_id',
        'identifier_id',
        'portal_id',
        'identification_rule_id'
    ];
}
