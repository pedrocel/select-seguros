<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'subscription_id',
        'amount',
        'status',
        'transaction_id',
        'payment_method',
        'due_date'
    ];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
}
