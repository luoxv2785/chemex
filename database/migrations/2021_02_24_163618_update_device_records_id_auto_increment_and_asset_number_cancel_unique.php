<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDeviceRecordsIdAutoIncrementAndAssetNumberCancelUnique extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('device_records', function (Blueprint $table) {
            $table->increments('id')->change();
            $table->dropUnique('device_records_asset_number_unique');
        });
        Schema::table('part_records', function (Blueprint $table) {
            $table->dropUnique('hardware_records_asset_number_unique');
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
            $table->id();
            $table->timestamps();
        });
    }
}
