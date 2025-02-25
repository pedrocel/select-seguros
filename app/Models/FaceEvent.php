<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FaceEvent extends Model
{
    use HasFactory, HasUuids;
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
        'image',
        'event',
        'timestamp',
        'user_id',
        'external_id',
        'organization_id',
        'group_id',
        'data',
    ];

    protected $casts = [
        'data' => 'array',
    ];

}
