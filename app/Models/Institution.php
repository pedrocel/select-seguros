<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'registration_mec',
        'type',
        'id_responsible',
        'email',
        'email_aux'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_institution', 'id_institution', 'id_user')->withPivot('status');
    }

    public function responsible()
    {
        return $this->belongsTo(User::class, 'id_responsible');
    }

}
