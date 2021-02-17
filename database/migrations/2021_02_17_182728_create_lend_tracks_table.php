<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLendTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lend_tracks', function (Blueprint $table) {
            $table->id();
            $table->string('item_type');
            $table->integer('item_id');
            $table->dateTime('lend_time');
            $table->string('lend_description');
            $table->integer('user_id');
            $table->dateTime('plan_return_time');
            $table->dateTime('return_time');
            $table->dateTime('return_description');
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
        Schema::dropIfExists('lend_tracks');
    }
}
