<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('whatsapp')->nullable()->after('email');
            $table->string('cpf')->unique()->nullable()->after('whatsapp');
            $table->date('birthdate')->nullable()->after('cpf');
            $table->boolean('is_emancipated')->nullable()->after('birthdate');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['whatsapp', 'cpf', 'birthdate']);
        });
    }
};
