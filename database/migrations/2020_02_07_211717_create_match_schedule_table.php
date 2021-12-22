<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_schedule', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('match');
            $table->integer('red1');
            $table->integer('red2');
            $table->integer('red3');
            $table->integer('blue1');
            $table->integer('blue2');
            $table->integer('blue3');
            $table->unsignedBigInteger('event')->nullable();
            $table->foreign('event')->references('id')->on('events')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('match_schedule');
    }
}
