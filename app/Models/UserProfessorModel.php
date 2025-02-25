<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfessorModel extends Model
{
    use HasFactory;

    protected $table = 'user_professores';
    
    protected $fillable = ['user_id', 'registration_mec', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
