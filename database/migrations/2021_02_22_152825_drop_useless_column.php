<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropUselessColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 这么写是为了兼容SQLite
        Schema::table('device_records', function (Blueprint $table) {
            $table->dropColumn('sn');
        });
        Schema::table('device_records', function (Blueprint $table) {
            $table->dropColumn('security_password');
        });
        Schema::table('device_records', function (Blueprint $table) {
            $table->dropColumn('admin_password');
        });
        Schema::table('device_records', function (Blueprint $table) {
            $table->dropColumn('location');
        });

        // 这么写是为了兼容SQLite
        Schema::table('part_records', function (Blueprint $table) {
            $table->dropColumn('sn');
        });
        Schema::table('part_records', function (Blueprint $table) {
            $table->dropColumn('location');
        });

        // 这么写是为了兼容SQLite
        Schema::table('software_records', function (Blueprint $table) {
            $table->dropColumn('sn');
        });
        Schema::table('software_records', function (Blueprint $table) {
            $table->dropColumn('location');
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
            $table->string('sn');
            $table->string('security_password');
            $table->string('admin_password');
            $table->string('location');
        });

        Schema::table('part_records', function (Blueprint $table) {
            $table->string('sn');
            $table->string('location');
        });

        Schema::table('software_records', function (Blueprint $table) {
            $table->string('sn');
            $table->string('location');
        });
    }
}
