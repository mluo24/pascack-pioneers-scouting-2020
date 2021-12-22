<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSoftDeleteData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_entries', function (Blueprint $table) {
            $table->softDeletes();
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
        Schema::table('data_entries', function (Blueprint $table) {
            $table->dropSoftDeletes();
            $table->dropForeign('data_entries_event_foreign');
        });
    }
}
