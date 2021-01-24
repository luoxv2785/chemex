<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_records', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->integer('status');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('service_tracks', function (Blueprint $table) {
            $table->id();
            $table->integer('service_id');
            $table->integer('device_id');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('service_issues', function (Blueprint $table) {
            $table->id();
            $table->integer('service_id');
            $table->string('issue');
            $table->string('description')->nullable();
            $table->integer('status');
            $table->dateTime('start');
            $table->dateTime('end')->nullable();
            $table->integer('checker')->nullable();
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
        Schema::dropIfExists('service_records');
        Schema::dropIfExists('service_tracks');
        Schema::dropIfExists('service_issues');
    }
}
