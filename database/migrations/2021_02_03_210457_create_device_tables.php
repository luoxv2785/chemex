<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeviceTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_records', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->integer('category_id');
            $table->integer('vendor_id');
            $table->string('sn')->nullable();
            $table->string('mac')->nullable();
            $table->string('ip')->nullable();
            $table->string('photo')->nullable();
            $table->string('location')->nullable();
            $table->double('price')->nullable();
            $table->string('asset_number')->nullable()->unique();
            $table->date('purchased')->nullable();
            $table->date('expired')->nullable();
            $table->string('ssh_username')->nullable();
            $table->string('ssh_password')->nullable();
            $table->string('ssh_port')->nullable();
            $table->string('security_password')->nullable();
            $table->string('admin_password')->nullable();
            $table->integer('purchased_channel_id')->nullable();
            $table->integer('depreciation_rule_id')->nullable();
            $table->string('extended_fields')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('device_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->integer('depreciation_rule_id')->nullable();
            $table->integer('parent_id')->nullable();
            $table->string('order')->default(0);
            $table->string('extended_fields')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('device_tracks', function (Blueprint $table) {
            $table->id();
            $table->integer('device_id');
            $table->integer('staff_id');
            $table->string('extended_fields')->nullable();
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
        Schema::dropIfExists('device_records');
        Schema::dropIfExists('device_categories');
        Schema::dropIfExists('device_tracks');
    }
}
