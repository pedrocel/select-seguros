<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'phone_number',
        'status'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_phones', 'id_phone', 'id_user')
                    ->withPivot('status'); // Podemos adicionar campos extras se necessário
    }
}
