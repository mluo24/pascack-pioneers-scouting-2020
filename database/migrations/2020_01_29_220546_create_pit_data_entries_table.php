<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePitDataEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pit_data_entries', function (Blueprint $table) {
            $table->bigIncrements('id');
            // eloquent foreign key for user model
            $table->unsignedBigInteger('uid')->nullable();
            $table->foreign('uid')->references('id')->on('users')->onDelete('set null');
            // foreign key for event
            $table->unsignedBigInteger('event')->nullable();
            $table->foreign('event')->references('id')->on('events')->onDelete('set null');
            $table->integer('match');
            $table->integer('teamid');
            $table->integer('alliance'); // 1 or 2
            $table->boolean('fit_trench');
            $table->string('chassis_drive');
            $table->integer('num_motors');
            $table->string('type_motors');
            $table->string('type_wheels');
            $table->integer('num_wheels');
            $table->boolean('two_speeds');
            $table->string('what_goal');
            $table->string('where_goal');
            $table->integer('stage');
            $table->boolean('can_climb');
            $table->string('where_climb');
            $table->boolean('move_bar');
            $table->text('other');	
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
        Schema::dropIfExists('pit_data_entries');
    }
}
