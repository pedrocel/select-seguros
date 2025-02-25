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
        Schema::create('contextos', function (Blueprint $table) {
            $table->id();
            $table->uuid('organization_id')->nullable();
            $table->year('ano_letivo');  // Ano letivo (ex: 2024, 2025)
            $table->string('descricao')->nullable();  // Descrição do contexto (opcional)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contextos');
    }
};
