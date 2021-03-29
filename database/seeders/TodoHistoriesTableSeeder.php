<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TodoHistoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('todo_histories')->delete();


    }
}
