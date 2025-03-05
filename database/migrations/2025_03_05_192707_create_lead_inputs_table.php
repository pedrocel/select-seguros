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
            $table->string('nome');
            $table->string('sobrenome');
            $table->string('email')->unique();
            $table->string('cpf')->unique();
            $table->string('telefone');
            $table->string('marca_veiculo');
            $table->string('modelo_veiculo');
            $table->year('ano_veiculo');
            $table->string('placa_veiculo');
            $table->integer('quilometragem_veiculo');
            $table->string('cep');
            $table->string('rua');
            $table->string('numero');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('complemento')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('status')->default(0);
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
