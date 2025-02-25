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
        Schema::create('student_responsible', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_student')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_responsible')->constrained('users')->onDelete('cascade');
            $table->foreignId('responsible_type_id')->constrained('responsible_types')->onDelete('cascade');
            $table->boolean('status')->default(true);
            $table->date('expiration_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_responsible');
    }
};
