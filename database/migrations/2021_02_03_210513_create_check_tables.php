<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_records', function (Blueprint $table) {
            $table->id();
            $table->string('check_item');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->integer('user_id');
            $table->integer('status')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('check_tracks', function (Blueprint $table) {
            $table->id();
            $table->integer('check_id');
            $table->integer('item_id');
            $table->integer('status');
            $table->integer('checker');
            $table->string('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('check_records');
        Schema::dropIfExists('check_tracks');
    }
}
