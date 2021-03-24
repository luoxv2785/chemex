<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropItemAssetNumberUnique extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('device_records', function (Blueprint $table) {
            $table->dropUnique('device_records_asset_number_unique');
        });
        Schema::table('part_records', function (Blueprint $table) {
            $table->dropUnique('part_records_asset_number_unique');
        });
        Schema::table('software_records', function (Blueprint $table) {
            $table->dropUnique('software_records_asset_number_unique');
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
            $table->string('asset_number')->after('id')->unique()->change();
        });
        Schema::table('part_records', function (Blueprint $table) {
            $table->string('asset_number')->after('id')->unique()->change();
        });
        Schema::table('software_records', function (Blueprint $table) {
            $table->string('asset_number')->after('id')->unique()->change();
        });
    }
}
