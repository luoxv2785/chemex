<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameStaffIdToUserId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('device_tracks', function (Blueprint $table) {
            $table->renameColumn('staff_id', 'user_id');
        });
        Schema::table('consumable_tracks', function (Blueprint $table) {
            $table->renameColumn('staff_id', 'user_id');
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
            $table->renameColumn('user_id', 'staff_id');
        });
        Schema::table('consumable_tracks', function (Blueprint $table) {
            $table->renameColumn('user_id', 'staff_id');
        });
    }
}
