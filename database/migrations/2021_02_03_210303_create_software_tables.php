<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

class CreateSoftwareTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('software_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name'); //软件名称
            $table->string('description')->nullable();  //描述
            $table->integer('parent_id')->default(null)->nullable();
            $table->string('order')->default(0);
            $table->string('extended_fields')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('software_records', function (Blueprint $table) {
            $table->id();
            $table->string('name'); //软件名称
            $table->string('description')->nullable();  //软件描述
            $table->string('asset_number')->nullable()->unique();
            $table->integer('category_id'); //软件分类
            $table->string('version');  //版本
            $table->integer('vendor_id');   //厂商
            $table->string('location')->nullable();
            $table->double('price')->nullable();    //价格
            $table->date('purchased')->nullable();   //购买日
            $table->date('expired')->nullable(); //有效期
            $table->char('distribution')->default('u');   //分发方式,u未知，o开源，f免费，b商业
            $table->string('sn')->nullable();   //序列号
            $table->integer('counts')->default(-1);  //授权数量
            $table->integer('purchased_channel_id')->nullable();
            $table->string('extended_fields')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('software_tracks', function (Blueprint $table) {
            $table->id();
            $table->integer('software_id');
            $table->integer('device_id');
            $table->string('extended_fields')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Artisan::call('db:seed', ['--class' => 'SoftwareCategoriesTableSeeder']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('software_categories');
        Schema::dropIfExists('software_records');
        Schema::dropIfExists('software_tracks');
    }
}
