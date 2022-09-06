<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id');
            $table->foreignId('event_template_id');
            $table->string('image')->nullable();
            $table->string('title');
            $table->string('name');
            $table->string('date');
            $table->string('time')->nullable();
            $table->string('location');
            $table->string('map')->default('-7.900074,112.606886');
            $table->text('description');
            $table->integer('total');
            $table->integer('price')->nullable();
            $table->dateTime('start');
            $table->dateTime('end');
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
        Schema::dropIfExists('events');
    }
}
