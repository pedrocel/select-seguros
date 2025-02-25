<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstitutionAddress extends Model
{
    use HasFactory;

    protected $table = 'institution_address';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_institution',
        'id_address',
        'status',
    ];

    public function institution()
    {
        return $this->belongsTo(Institution::class, 'id_institution');
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'id_address');
    }
}
