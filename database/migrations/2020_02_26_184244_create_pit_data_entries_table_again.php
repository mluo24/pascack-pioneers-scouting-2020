<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePitDataEntriesTableAgain extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('pit_data_entries');
        Schema::create('pit_data_entries', function (Blueprint $table) {
            $table->bigIncrements('id');
            // eloquent foreign key for user model
            $table->unsignedBigInteger('uid')->nullable();
            $table->foreign('uid')->references('id')->on('users')->onDelete('set null');
            // foreign key for event
            $table->unsignedBigInteger('event')->nullable();
            $table->foreign('event')->references('id')->on('events')->onDelete('set null');
            $table->integer('teamid');
            $table->string('chassis_drive');
            $table->boolean('two_speeds');
            $table->double('weight', 10, 3);
            $table->integer('num_motors');
            $table->string('type_motors');
            $table->integer('num_wheels');
            $table->string('type_wheels');
            $table->boolean('fit_trench');
            $table->boolean('wheel');
            $table->string('what_goal');
            $table->boolean('can_climb');
            $table->boolean('move_bar');
            $table->text('other');	
            $table->timestamps();
            $table->softDeletes();
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
