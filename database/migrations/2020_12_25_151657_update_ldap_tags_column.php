<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateLdapTagsColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('staff_departments', function (Blueprint $table) {
            $table->integer('ad_tag')->default(0);
        });
        Schema::table('staff_records', function (Blueprint $table) {
            $table->integer('ad_tag')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('staff_departments', function (Blueprint $table) {
            $table->dropColumn('ad_tag');
        });
        Schema::table('staff_records', function (Blueprint $table) {
            $table->dropColumn('ad_tag');
        });
    }
}
