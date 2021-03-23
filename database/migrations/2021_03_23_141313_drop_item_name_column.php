<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropItemNameColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('device_records', function (Blueprint $table) {
            $table->dropColumn('name');
        });
        Schema::table('part_records', function (Blueprint $table) {
            $table->dropColumn('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('device_records', function (Blueprint $table) {
            $table->string('name')->nullable();
        });
        Schema::table('part_records', function (Blueprint $table) {
            $table->string('name')->nullable();
        });
    }
}
