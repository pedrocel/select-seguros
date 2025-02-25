<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NotificationLog extends Model
{
    protected $fillable = ['notification_id', 'channel', 'status'];

    public function notification(): BelongsTo
    {
        return $this->belongsTo(Notification::class);
    }
}