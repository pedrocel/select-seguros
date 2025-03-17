<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $fillable = [
        'fipe_code',
        'brand',
        'model',
        'year',
        'value',
        'fuel',
        'coverage',
        'name',
        'whatsapp',
        'document',
        'email',
        'id_vehicle',
        'plate',
        'chassi',
        'some_driver_18_25_years_old',
        'id_address',
        'id_lead',
        'id_fipe_lmi_coverage',
        'id_glass_coverage',
        'id_replacement_car_coverage',
        'id_support_coverage',
        'id_basic_coverage',
        'year_manufacture',
        'id_use',
        'zero_km',
        'optional_coverages',
        'status'
    ];

    protected $casts = [
        'coverage' => 'array',  // Transforma o campo coverage em array ao buscar do banco
        'optional_coverages' => 'array',  // Transforma o campo coverage em array ao buscar do banco
    ];

}
