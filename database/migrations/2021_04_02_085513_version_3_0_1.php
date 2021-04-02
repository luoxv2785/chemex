<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Version301 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approval_records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('approval_tracks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('approval_id');
            $table->string('checkers');
            $table->integer('order');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('approval_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('item');
            $table->integer('item_id');
            $table->integer('approval_id');
            $table->integer('order_id');
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
        Schema::dropIfExists('approval_records');
        Schema::dropIfExists('approval_tracks');
        Schema::dropIfExists('approval_histories');
    }
}
