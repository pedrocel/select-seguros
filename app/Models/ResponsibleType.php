<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponsibleType extends Model
{
    use HasFactory;

    protected $table = 'responsible_types';

    protected $fillable = [
        'name',       // Nome do tipo de responsável
        'description', // Descrição do tipo de responsável
    ];

    public function studentResponsibles()
    {
        return $this->hasMany(StudentResponsible::class, 'responsible_type_id');
    }
}
