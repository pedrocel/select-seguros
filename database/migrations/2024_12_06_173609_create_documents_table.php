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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('document_type_id')
                  ->nullable()
                  ->constrained('document_types')
                  ->onDelete('set null');
            $table->foreignId('student_id')
                  ->nullable()
                  ->constrained('users')
                  ->onDelete('set null');
            $table->string('file_path')->nullable(); // Caminho do arquivo pode ser nulo
            $table->integer('status')->default(0); // Status inicial como 0 (pendente)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
