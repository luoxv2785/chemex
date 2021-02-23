<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumnOrderFromVarcharToInt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('device_categories', function (Blueprint $table) {
            $table->integer('order')->default(0)->change();
        });
        Schema::table('part_categories', function (Blueprint $table) {
            $table->integer('order')->default(0)->change();
        });
        Schema::table('software_categories', function (Blueprint $table) {
            $table->integer('order')->default(0)->change();
        });
        Schema::table('consumable_categories', function (Blueprint $table) {
            $table->integer('order')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('device_categories', function (Blueprint $table) {
            $table->string('order')->change();
        });
        Schema::table('part_categories', function (Blueprint $table) {
            $table->string('order')->change();
        });
        Schema::table('software_categories', function (Blueprint $table) {
            $table->string('order')->change();
        });
        Schema::table('consumable_categories', function (Blueprint $table) {
            $table->string('order')->change();
        });
    }
}
