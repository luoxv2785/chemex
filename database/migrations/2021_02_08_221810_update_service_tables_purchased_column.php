<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateServiceTablesPurchasedColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_records', function (Blueprint $table) {
            $table->double('price')->nullable();
            $table->date('purchased')->nullable();
            $table->date('expired')->nullable();
            $table->integer('purchased_channel_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_records', function (Blueprint $table) {
            $table->dropColumn('price');
            $table->dropColumn('purchased');
            $table->dropColumn('expired');
            $table->dropColumn('purchased_channel_id');
        });
    }
}
