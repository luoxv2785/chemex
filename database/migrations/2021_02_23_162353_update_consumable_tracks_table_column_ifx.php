<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateConsumableTracksTableColumnIfx extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('consumable_tracks', function (Blueprint $table) {
            $table->date('purchased')->change();
            $table->date('expired')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('consumable_tracks', function (Blueprint $table) {
            $table->double('purchased')->change();
            $table->double('expired')->change();
        });
    }
}
