<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateLendTracksColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lend_tracks', function (Blueprint $table) {
            $table->dateTime('return_time')->nullable()->change();
            $table->dateTime('return_description')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lend_tracks', function (Blueprint $table) {
            $table->dateTime('return_time')->change();
            $table->dateTime('return_description')->change();
        });
    }
}
