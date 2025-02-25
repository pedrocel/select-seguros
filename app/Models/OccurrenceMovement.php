<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OccurrenceMovement extends Model
{
    protected $fillable = [
        'occurrence_id',
        'description',
        'created_by',
    ];

    // Relacionamento com a ocorrência
    public function occurrence(): BelongsTo
    {
        return $this->belongsTo(Occurrence::class);
    }

    // Relacionamento com o usuário que criou a movimentação
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
