<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'subscription_id',
        'due_date',
        'amount',
        'status',
        'asaas_invoice_id',
        'pix_code',
        'pix_qr_code',
        'boleto_url',
        'checkout_url',
    ];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
}
