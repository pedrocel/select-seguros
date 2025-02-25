<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Occurrence extends Model
{
    // Relacionamento com o responsável
    public function responsible(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_responsible');
    }

    // Relacionamento com a secretaria
    public function secretary(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_secretary');
    }

    // Relacionamento com o assistente social
    public function social(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_social');
    }

    // Relacionamento com o aluno
    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_student');
    }

    // Relacionamento com as movimentações
    public function movements(): HasMany
    {
        return $this->hasMany(OccurrenceMovement::class);
    }
}
