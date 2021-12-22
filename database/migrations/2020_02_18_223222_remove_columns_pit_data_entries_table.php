<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveColumnsPitDataEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pit_data_entries', function (Blueprint $table) {
            $table->dropForeign(['event']);
            $table->dropColumn(['event', 'match', 'alliance']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pit_data_entries', function (Blueprint $table) {
            
        });
    }
}
