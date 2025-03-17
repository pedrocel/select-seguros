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
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->string('fipe_code')->nullable();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->integer('year')->nullable();
            $table->float('value')->nullable();
            $table->string('fuel')->nullable();
            $table->string('name')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('document')->nullable();
            $table->string('email')->nullable();
            $table->string('id_vehicle')->nullable();
            $table->string('plate')->nullable();
            $table->string('chassi')->nullable();
            $table->integer('id_address')->nullable();
            $table->integer('id_lead')->nullable();
            $table->integer('id_fipe_lmi_coverage')->nullable();
            $table->integer('id_glass_coverage')->nullable();
            $table->integer('id_replacement_car_coverage')->nullable();
            $table->integer('id_support_coverage')->nullable();
            $table->integer('id_basic_coverage')->nullable();
            $table->integer('year_manufacture')->nullable();
            $table->integer('id_use')->nullable();
            $table->boolean('zero_km')->nullable();
            $table->boolean('some_driver_18_25_years_old')->nullable();
            $table->json('optional_coverages')->nullable();
            $table->json('coverage')->nullable();  // Salva os dados de cobertura como JSON
            $table->integer('status')->nullable();  // Salva os dados de cobertura como JSON
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotations');
    }
};
