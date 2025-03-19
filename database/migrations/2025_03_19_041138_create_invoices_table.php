<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subscription_id')->constrained('subscriptions')->onDelete('cascade');
            $table->date('due_date');
            $table->decimal('amount', 10, 2);
            $table->enum('status', ['pending', 'paid', 'overdue']);
            $table->string('asaas_invoice_id')->nullable(); // ID da fatura no Asaas
            $table->string('pix_code')->nullable(); // Código do Pix
            $table->string('pix_qr_code')->nullable(); // QR Code do Pix
            $table->string('boleto_url')->nullable(); // URL do boleto
            $table->string('checkout_url')->nullable(); // URL do checkout para cartão
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
