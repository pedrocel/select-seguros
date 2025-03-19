<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'plan_id',
        'payment_method',
        'expires_at',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
