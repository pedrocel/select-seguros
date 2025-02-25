<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'facial_image_base64',
        'whatsapp',
        'cpf',
        'birthdate',
        'is_emancipated',
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relacionamento com a tabela intermediária user_perfis
     */
    public function userPerfis()
    {
        return $this->hasMany(UserPerfilModel::class, 'user_id');
    }

    /**
     * Relacionamento direto com a tabela perfis
     */
    public function perfis()
    {
        return $this->belongsToMany(PerfilModel::class, 'user_perfis', 'user_id', 'perfil_id')
            ->using(UserPerfilModel::class)
            ->withPivot(['is_atual', 'status']);
    }

    /**
     * Obter o perfil atual do usuário
     */
    public function perfilAtual()
    {
        return $this->userPerfis()->where('is_atual', true)->with('perfil')->first()?->perfil;
    }

    public function adm()
    {
        return $this->hasOne(UserPerfilModel::class, 'user_id', 'id')
            ->where('status', 1)->where('perfil_id', 2)
            ->where('is_atual', 1);
    }

    public function student()
    {
        return $this->hasOne(UserPerfilModel::class, 'user_id', 'id')
            ->where('status', 1)->where('perfil_id', 1)
            ->where('is_atual', 1);
    }

    public function director()
    {
        return $this->hasOne(UserPerfilModel::class, 'user_id', 'id')
            ->where('status', 1)->where('perfil_id', 3)
            ->where('is_atual', 1);
    }

    public function addresses()
    {
        return $this->belongsToMany(Address::class, 'user_address', 'id_user', 'id_address')
                    ->withPivot('in_use', 'status');
    }

    public function phones()
    {
        return $this->belongsToMany(Phone::class, 'user_phone', 'id_user', 'id_phone')
                    ->withPivot('status');
    }

    /**
     * Relacionamento com a tabela intermediária user_organizations
     */
    public function organizations()
    {
        return $this->belongsToMany(OrganizationModel::class, 'user_organizations', 'user_id', 'organization_id')
                    ->withTimestamps();
    }

    public function responsibles()
    {
        return $this->hasMany(StudentResponsible::class, 'id_student');
    }
    
    public function students()
    {
        return $this->hasMany(StudentResponsible::class, 'id_responsible');
    }
    /**
     * Get the identifier that will be stored in the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key-value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}