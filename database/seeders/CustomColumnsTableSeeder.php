<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CustomColumnsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('custom_columns')->delete();

        \DB::table('custom_columns')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'table_name' => 'consumable_records',
                    'name' => 'dddd',
                    'nick_name' => 'dddd',
                    'type' => 'string',
                    'is_nullable' => 0,
                    'select_options' => NULL,
                    'deleted_at' => '2021-03-26 08:32:56',
                    'created_at' => '2021-03-25 09:35:52',
                    'updated_at' => '2021-03-26 08:32:56',
                ),
            1 =>
                array(
                    'id' => 2,
                    'table_name' => 'device_records',
                    'name' => 'ccccc',
                    'nick_name' => 'ccccc',
                    'type' => 'string',
                    'is_nullable' => 0,
                    'select_options' => NULL,
                    'deleted_at' => '2021-03-25 19:49:12',
                    'created_at' => '2021-03-25 09:42:22',
                    'updated_at' => '2021-03-25 19:49:12',
                ),
            2 =>
                array(
                    'id' => 3,
                    'table_name' => 'device_records',
                    'name' => 'aaaa',
                    'nick_name' => 'aaaa',
                    'type' => 'select',
                    'is_nullable' => 0,
                    'select_options' => '[{"item":"A","_remove_":"0"},{"item":"B","_remove_":"0"},{"item":"C","_remove_":"0"}]',
                    'deleted_at' => '2021-03-25 22:49:34',
                    'created_at' => '2021-03-25 19:48:58',
                    'updated_at' => '2021-03-25 22:49:34',
                ),
            3 =>
                array(
                    'id' => 4,
                    'table_name' => 'device_records',
                    'name' => 'test',
                    'nick_name' => '测试',
                    'type' => 'string',
                    'is_nullable' => 0,
                    'select_options' => NULL,
                    'deleted_at' => '2021-03-25 23:55:59',
                    'created_at' => '2021-03-25 22:49:50',
                    'updated_at' => '2021-03-25 23:55:59',
                ),
            4 =>
                array(
                    'id' => 5,
                    'table_name' => 'device_records',
                    'name' => 'aaaa',
                    'nick_name' => 'aaaa',
                    'type' => 'string',
                    'is_nullable' => 0,
                    'select_options' => NULL,
                    'deleted_at' => '2021-03-26 08:32:23',
                    'created_at' => '2021-03-26 08:16:03',
                    'updated_at' => '2021-03-26 08:32:23',
                ),
            5 =>
                array(
                    'id' => 6,
                    'table_name' => 'device_records',
                    'name' => 'test',
                    'nick_name' => '测试',
                    'type' => 'string',
                    'is_nullable' => 0,
                    'select_options' => NULL,
                    'deleted_at' => '2021-03-26 08:33:30',
                    'created_at' => '2021-03-26 08:33:25',
                    'updated_at' => '2021-03-26 08:33:30',
                ),
            6 =>
                array(
                    'id' => 7,
                    'table_name' => 'device_records',
                    'name' => 'test',
                    'nick_name' => '测试',
                    'type' => 'string',
                    'is_nullable' => 0,
                    'select_options' => NULL,
                    'deleted_at' => '2021-03-26 08:34:58',
                    'created_at' => '2021-03-26 08:34:55',
                    'updated_at' => '2021-03-26 08:34:58',
                ),
            7 =>
                array(
                    'id' => 8,
                    'table_name' => 'device_records',
                    'name' => 'test2',
                    'nick_name' => '测试',
                    'type' => 'string',
                    'is_nullable' => 0,
                    'select_options' => NULL,
                    'deleted_at' => '2021-03-26 09:46:00',
                    'created_at' => '2021-03-26 08:35:09',
                    'updated_at' => '2021-03-26 09:46:00',
                ),
            8 =>
                array(
                    'id' => 9,
                    'table_name' => 'part_records',
                    'name' => 'test',
                    'nick_name' => 'test2',
                    'type' => 'string',
                    'is_nullable' => 0,
                    'select_options' => NULL,
                    'deleted_at' => NULL,
                    'created_at' => '2021-03-26 09:08:34',
                    'updated_at' => '2021-03-26 09:08:34',
                ),
            9 =>
                array(
                    'id' => 10,
                    'table_name' => 'device_records',
                    'name' => 'test3',
                    'nick_name' => '测试',
                    'type' => 'select',
                    'is_nullable' => 0,
                    'select_options' => '[{"item":"A"},{"item":"B"},{"item":"C"}]',
                    'deleted_at' => NULL,
                    'created_at' => '2021-03-26 09:46:13',
                    'updated_at' => '2021-03-26 10:23:14',
                ),
            10 =>
                array(
                    'id' => 11,
                    'table_name' => 'device_records',
                    'name' => 'test2',
                    'nick_name' => '测试2',
                    'type' => 'string',
                    'is_nullable' => 0,
                    'select_options' => NULL,
                    'deleted_at' => NULL,
                    'created_at' => '2021-03-26 10:21:10',
                    'updated_at' => '2021-03-26 10:21:10',
                ),
        ));


    }
}
