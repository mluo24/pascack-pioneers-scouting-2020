<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_entries', function (Blueprint $table) {
            $table->bigIncrements('id');
            // eloquent foreign key for user model
            $table->unsignedBigInteger('uid')->nullable();
            $table->foreign('uid')->references('id')->on('users')->onDelete('set null');
            // foreign key for event
            $table->unsignedBigInteger('event')->nullable();
            $table->integer('match');
            $table->integer('teamid');
            $table->integer('alliance'); // 1 or 2
            
            $table->integer('startl'); // 1, 2, or 3
            $table->boolean('intline'); // 0 or 1
            $table->integer('abot'); 
            $table->integer('atop'); 
            $table->integer('ainn');
            $table->boolean('apick'); // 0 or 1
            
            $table->integer('tbot');
            $table->integer('ttop');
            $table->integer('tinn');
            $table->integer('miss');
            
            $table->boolean('woj1'); // 0 or 1
            $table->boolean('woj2'); // 0 or 1
            
            $table->boolean('defed'); // 0 or 1
            $table->boolean('defing'); // 0 or 1
            $table->boolean('hang'); // 0 or 1
            $table->boolean('park'); // 0 or 1
            $table->boolean('lvl'); // 0 or 1
            $table->integer('score');
            
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
        Schema::dropIfExists('data_entries');
    }
}
