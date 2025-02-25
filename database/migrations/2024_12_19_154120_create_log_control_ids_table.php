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
        Schema::create('log_control_ids', function (Blueprint $table) {
            $table->id();
            $table->string('user_control_id')->nullable();
            $table->string('user_facial_id')->nullable();
            $table->string('time')->nullable();
            $table->string('event')->nullable();
            $table->string('device_id')->nullable();
            $table->string('identifier_id')->nullable();
            $table->string('portal_id')->nullable();
            $table->string('identification_rule_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_control_ids');
    }
};
