<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

class CreatePartTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('part_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->integer('depreciation_rule_id')->nullable();
            $table->integer('parent_id')->default(null)->nullable();
            $table->string('order')->default(0);
            $table->string('extended_fields')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('part_records', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('asset_number')->nullable()->unique();
            $table->integer('category_id');
            $table->integer('vendor_id');
            $table->string('specification');
            $table->string('location')->nullable();
            $table->string('sn')->nullable();
            $table->double('price')->nullable();
            $table->date('purchased')->nullable();
            $table->date('expired')->nullable();
            $table->integer('purchased_channel_id')->nullable();
            $table->integer('depreciation_rule_id')->nullable();
            $table->string('extended_fields')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('part_tracks', function (Blueprint $table) {
            $table->id();
            $table->integer('part_id');
            $table->integer('device_id');
            $table->string('extended_fields')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Artisan::call('db:seed', ['--class' => 'PartCategoriesTableSeeder']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('part_categories');
        Schema::dropIfExists('part_records');
        Schema::dropIfExists('part_tracks');
    }
}
