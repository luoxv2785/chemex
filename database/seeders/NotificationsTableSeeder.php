<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NotificationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('notifications')->delete();

        \DB::table('notifications')->insert(array(
            0 =>
                array(
                    'id' => '490faded-aac7-4ce9-989d-1ed767e1b434',
                    'type' => 'App\\Notifications\\NewTodoRecord',
                    'notifiable_type' => 'App\\Models\\User',
                    'notifiable_id' => 3,
                    'data' => '{"todo_record_id":2,"title":"new_todo_record_title","content":"new_todo_record_content","expired":null,"url":"http:\\/\\/127.0.0.1:8000\\/todo\\/records\\/2"}',
                    'read_at' => NULL,
                    'deleted_at' => NULL,
                    'created_at' => '2021-03-27 12:13:24',
                    'updated_at' => '2021-03-27 12:13:24',
                ),
            1 =>
                array(
                    'id' => '87b1b63c-4354-40bd-9be3-8a8dd6e36e3f',
                    'type' => 'App\\Notifications\\NewCheckRecord',
                    'notifiable_type' => 'App\\Models\\User',
                    'notifiable_id' => 1,
                    'data' => '{"check_record_id":1,"title":"new_check_record_title","content":"new_check_record_content","expired":"2021-03-24 09:33:47","url":"http:\\/\\/127.0.0.1:8000\\/check\\/records\\/1"}',
                    'read_at' => NULL,
                    'deleted_at' => NULL,
                    'created_at' => '2021-03-24 09:33:49',
                    'updated_at' => '2021-03-24 09:33:49',
                ),
        ));


    }
}
