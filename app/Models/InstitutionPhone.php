<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstitutionPhone extends Model
{
    use HasFactory;

    protected $table = 'institution_phone';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_institution',
        'id_phone',
        'status',
    ];

    public function institution()
    {
        return $this->belongsTo(Institution::class, 'id_institution');
    }

    public function phone()
    {
        return $this->belongsTo(Phone::class, 'id_phone');
    }
}
