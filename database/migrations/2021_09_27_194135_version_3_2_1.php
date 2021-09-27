<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Version321 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('custom_columns', function (Blueprint $table) {
            $table->renameColumn('is_nullable', 'must');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('custom_columns', function (Blueprint $table) {
            $table->renameColumn('must', 'is_nullable');
        });
    }
}
