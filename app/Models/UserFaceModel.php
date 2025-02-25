<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFaceModel extends Model
{
    use HasFactory;

    // Defina a tabela, caso o nome seja diferente
    protected $table = 'user_face';

    // Campos que podem ser preenchidos
    protected $fillable = [
        'name',
        'email',
        'user_id',
        'facial_image_base64',
        'status',
        'organization_id',
    ];

    // Caso o campo `user_id` seja uma chave estrangeira, podemos definir o relacionamento
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Caso o campo `organization_id` seja uma chave estrangeira
    public function organization()
    {
        return $this->belongsTo(OrganizationModel::class);
    }
}
