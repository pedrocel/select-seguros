<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaceEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('face_events', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->nullable();
            $table->text('image')->nullable();
            $table->string('event')->nullable();
            $table->timestamp('timestamp')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('external_id')->nullable();
            $table->unsignedBigInteger('group_id')->nullable();
            $table->json('data')->nullable();
            $table->uuid('organization_id')->nullable();
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('set null');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('face_events');
    }
}