<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropLendTracksTableAndUpdateItemTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('lend_tracks');

        Schema::table('device_tracks', function (Blueprint $table) {
            $table->dateTime('lend_time')->nullable();
            $table->string('lend_description')->nullable();
            $table->dateTime('plan_return_time')->nullable();
            $table->dateTime('return_time')->nullable();
            $table->string('return_description')->nullable();
        });

        Schema::table('part_tracks', function (Blueprint $table) {
            $table->dateTime('lend_time')->nullable();
            $table->string('lend_description')->nullable();
            $table->dateTime('plan_return_time')->nullable();
            $table->dateTime('return_time')->nullable();
            $table->string('return_description')->nullable();
        });

        Schema::table('software_tracks', function (Blueprint $table) {
            $table->dateTime('lend_time')->nullable();
            $table->string('lend_description')->nullable();
            $table->dateTime('plan_return_time')->nullable();
            $table->dateTime('return_time')->nullable();
            $table->string('return_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('device_tracks', function (Blueprint $table) {
            $table->dropColumn('lend_time');
            $table->dropColumn('lend_description');
            $table->dropColumn('plan_return_time');
            $table->dropColumn('return_time');
            $table->dropColumn('return_description');
        });

        Schema::table('part_tracks', function (Blueprint $table) {
            $table->dropColumn('lend_time');
            $table->dropColumn('lend_description');
            $table->dropColumn('plan_return_time');
            $table->dropColumn('return_time');
            $table->dropColumn('return_description');
        });

        Schema::table('software_tracks', function (Blueprint $table) {
            $table->dropColumn('lend_time');
            $table->dropColumn('lend_description');
            $table->dropColumn('plan_return_time');
            $table->dropColumn('return_time');
            $table->dropColumn('return_description');
        });
    }
}
