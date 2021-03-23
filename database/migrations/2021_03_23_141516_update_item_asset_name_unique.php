<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateItemAssetNameUnique extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('device_records', function (Blueprint $table) {
            $table->string('asset_number')->after('id')->unique()->change();
        });
        Schema::table('part_records', function (Blueprint $table) {
            $table->string('asset_number')->after('id')->unique()->change();
        });
        Schema::table('software_records', function (Blueprint $table) {
            $table->string('asset_number')->after('id')->unique()->change();
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
            $table->string('asset_number')->nullable()->change();
        });
        Schema::table('part_records', function (Blueprint $table) {
            $table->string('asset_number')->nullable()->change();
        });
        Schema::table('software_records', function (Blueprint $table) {
            $table->string('asset_number')->nullable()->change();
        });
    }
}
