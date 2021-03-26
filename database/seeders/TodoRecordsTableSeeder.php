<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TodoRecordsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('todo_records')->delete();
        
        \DB::table('todo_records')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '3212312',
                'description' => NULL,
                'start' => '2021-03-18 20:21:32',
                'end' => NULL,
                'priority' => 'normal',
                'user_id' => NULL,
                'tags' => '',
                'done_description' => NULL,
                'emoji' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-18 20:21:35',
                'updated_at' => '2021-03-18 20:21:35',
            ),
        ));
        
        
    }
}