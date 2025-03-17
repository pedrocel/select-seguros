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
        Schema::create('lead_inputs', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('cpf')->unique()->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('marca_veiculo')->nullable();
            $table->string('modelo_veiculo')->nullable();
            $table->year('ano_veiculo')->nullable();
            $table->string('placa_veiculo')->nullable();
            $table->integer('quilometragem_veiculo')->nullable();
            $table->string('cep')->nullable();
            $table->string('rua')->nullable();
            $table->string('numero')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('complemento')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('status')->default(0)->nullable();
            $table->string('ip')->nullable();
            $table->string('user_agent')->nullable();
            $table->string('referal')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lead_inputs');
    }
};
