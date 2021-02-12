<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodoTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todo_records', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->mediumText('description')->nullable();
            $table->dateTime('start');
            $table->dateTime('end')->nullable();
            $table->string('priority')->default('normal');
            $table->integer('user_id')->nullable();
            $table->string('tags')->nullable();
            $table->text('done_description')->nullable();
            $table->string('emoji')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('todo_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('todo_id');
            $table->text('origin_json_string');
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
        Schema::dropIfExists('todo_records');
        Schema::dropIfExists('todo_histories');
    }
}
