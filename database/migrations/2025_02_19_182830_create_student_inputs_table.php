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
        Schema::create('student_inputs', function (Blueprint $table) {
            $table->id();
            $table->string('cpf')->nullable();
            $table->string('password')->nullable();
            $table->integer('status')->nullable();
            $table->uuid('organization_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_inputs');
    }
};
