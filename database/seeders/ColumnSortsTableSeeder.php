<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ColumnSortsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('column_sorts')->delete();

        \DB::table('column_sorts')->insert(array(
            0 =>
                array(
                    'id' => 34,
                    'table_name' => 'device_records',
                    'field' => 'mac',
                    'order' => 0,
                    'created_at' => '2021-03-27 19:37:37',
                    'updated_at' => '2021-03-27 19:37:37',
                ),
            1 =>
                array(
                    'id' => 35,
                    'table_name' => 'device_records',
                    'field' => 'id',
                    'order' => 2,
                    'created_at' => '2021-03-27 19:37:37',
                    'updated_at' => '2021-03-27 19:44:14',
                ),
            2 =>
                array(
                    'id' => 36,
                    'table_name' => 'device_records',
                    'field' => 'description',
                    'order' => 3,
                    'created_at' => '2021-03-27 19:37:37',
                    'updated_at' => '2021-03-27 19:44:14',
                ),
            3 =>
                array(
                    'id' => 37,
                    'table_name' => 'device_records',
                    'field' => 'ip',
                    'order' => 4,
                    'created_at' => '2021-03-27 19:37:37',
                    'updated_at' => '2021-03-27 19:44:14',
                ),
            4 =>
                array(
                    'id' => 38,
                    'table_name' => 'device_records',
                    'field' => 'photo',
                    'order' => 5,
                    'created_at' => '2021-03-27 19:37:37',
                    'updated_at' => '2021-03-27 19:44:14',
                ),
            5 =>
                array(
                    'id' => 39,
                    'table_name' => 'device_records',
                    'field' => 'ssh_username',
                    'order' => 6,
                    'created_at' => '2021-03-27 19:37:37',
                    'updated_at' => '2021-03-27 19:44:14',
                ),
            6 =>
                array(
                    'id' => 40,
                    'table_name' => 'device_records',
                    'field' => 'ssh_password',
                    'order' => 7,
                    'created_at' => '2021-03-27 19:37:37',
                    'updated_at' => '2021-03-27 19:44:14',
                ),
            7 =>
                array(
                    'id' => 41,
                    'table_name' => 'device_records',
                    'field' => 'ssh_port',
                    'order' => 8,
                    'created_at' => '2021-03-27 19:37:37',
                    'updated_at' => '2021-03-27 19:44:14',
                ),
            8 =>
                array(
                    'id' => 42,
                    'table_name' => 'device_records',
                    'field' => 'price',
                    'order' => 9,
                    'created_at' => '2021-03-27 19:37:37',
                    'updated_at' => '2021-03-27 19:44:14',
                ),
            9 =>
                array(
                    'id' => 43,
                    'table_name' => 'device_records',
                    'field' => 'purchased',
                    'order' => 10,
                    'created_at' => '2021-03-27 19:37:37',
                    'updated_at' => '2021-03-27 19:44:14',
                ),
            10 =>
                array(
                    'id' => 44,
                    'table_name' => 'device_records',
                    'field' => 'expired',
                    'order' => 11,
                    'created_at' => '2021-03-27 19:37:37',
                    'updated_at' => '2021-03-27 19:44:14',
                ),
            11 =>
                array(
                    'id' => 45,
                    'table_name' => 'device_records',
                    'field' => 'asset_number',
                    'order' => 12,
                    'created_at' => '2021-03-27 19:37:37',
                    'updated_at' => '2021-03-27 19:44:14',
                ),
            12 =>
                array(
                    'id' => 46,
                    'table_name' => 'device_records',
                    'field' => 'created_at',
                    'order' => 13,
                    'created_at' => '2021-03-27 19:37:37',
                    'updated_at' => '2021-03-27 19:44:14',
                ),
            13 =>
                array(
                    'id' => 47,
                    'table_name' => 'device_records',
                    'field' => 'updated_at',
                    'order' => 14,
                    'created_at' => '2021-03-27 19:37:37',
                    'updated_at' => '2021-03-27 19:44:14',
                ),
            14 =>
                array(
                    'id' => 48,
                    'table_name' => 'device_records',
                    'field' => 'test3',
                    'order' => 15,
                    'created_at' => '2021-03-27 19:37:37',
                    'updated_at' => '2021-03-27 19:44:14',
                ),
            15 =>
                array(
                    'id' => 49,
                    'table_name' => 'device_records',
                    'field' => 'test2',
                    'order' => 16,
                    'created_at' => '2021-03-27 19:37:37',
                    'updated_at' => '2021-03-27 19:44:14',
                ),
            16 =>
                array(
                    'id' => 50,
                    'table_name' => 'device_records',
                    'field' => 'category.name',
                    'order' => 17,
                    'created_at' => '2021-03-27 19:37:37',
                    'updated_at' => '2021-03-27 19:44:14',
                ),
            17 =>
                array(
                    'id' => 51,
                    'table_name' => 'device_records',
                    'field' => 'vendor.name',
                    'order' => 18,
                    'created_at' => '2021-03-27 19:37:37',
                    'updated_at' => '2021-03-27 19:44:14',
                ),
            18 =>
                array(
                    'id' => 52,
                    'table_name' => 'device_records',
                    'field' => 'user.name',
                    'order' => 19,
                    'created_at' => '2021-03-27 19:37:37',
                    'updated_at' => '2021-03-27 19:44:14',
                ),
            19 =>
                array(
                    'id' => 53,
                    'table_name' => 'device_records',
                    'field' => 'user.department.name',
                    'order' => 20,
                    'created_at' => '2021-03-27 19:37:37',
                    'updated_at' => '2021-03-27 19:44:14',
                ),
            20 =>
                array(
                    'id' => 54,
                    'table_name' => 'device_records',
                    'field' => 'expiration_left_days',
                    'order' => 1,
                    'created_at' => '2021-03-27 19:37:37',
                    'updated_at' => '2021-03-27 19:44:14',
                ),
            21 =>
                array(
                    'id' => 55,
                    'table_name' => 'device_records',
                    'field' => 'channel.name',
                    'order' => 21,
                    'created_at' => '2021-03-27 19:37:37',
                    'updated_at' => '2021-03-27 19:37:37',
                ),
            22 =>
                array(
                    'id' => 56,
                    'table_name' => 'device_records',
                    'field' => 'depreciation.name',
                    'order' => 22,
                    'created_at' => '2021-03-27 19:37:37',
                    'updated_at' => '2021-03-27 19:37:37',
                ),
            23 =>
                array(
                    'id' => 57,
                    'table_name' => 'device_records',
                    'field' => 'qrcode',
                    'order' => 23,
                    'created_at' => '2021-03-27 19:37:37',
                    'updated_at' => '2021-03-27 19:37:37',
                ),
        ));


    }
}
