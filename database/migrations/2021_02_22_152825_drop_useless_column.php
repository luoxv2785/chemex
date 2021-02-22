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
        Schema::table('device_records', function (Blueprint $table) {
            $table->dropColumn('sn');
            $table->dropColumn('security_password');
            $table->dropColumn('admin_password');
            $table->dropColumn('location');
        });

        Schema::table('part_records', function (Blueprint $table) {
            $table->dropColumn('sn');
            $table->dropColumn('location');
        });

        Schema::table('software_records', function (Blueprint $table) {
            $table->dropColumn('sn');
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
