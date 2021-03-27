<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VendorRecordsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('vendor_records')->delete();
        
        \DB::table('vendor_records')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '微软 Microsoft',
                'description' => NULL,
                'location' => NULL,
                'contacts' => '[{"contact_name":"A","phone":"11111111111","email":null,"title":null}]',
                'deleted_at' => NULL,
                'created_at' => '2021-01-19 11:57:11',
                'updated_at' => '2021-03-25 20:19:02',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '英特尔 Intel',
                'description' => NULL,
                'location' => NULL,
                'contacts' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-01-19 11:57:31',
                'updated_at' => '2021-01-19 11:58:10',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'AMD',
                'description' => NULL,
                'location' => NULL,
                'contacts' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-01-19 11:57:36',
                'updated_at' => '2021-01-19 11:57:36',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => '苹果 Apple',
                'description' => NULL,
                'location' => NULL,
                'contacts' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-01-19 11:57:41',
                'updated_at' => '2021-01-19 11:58:16',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => '英伟达 Nvidia',
                'description' => NULL,
                'location' => NULL,
                'contacts' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-01-19 11:57:50',
                'updated_at' => '2021-01-19 11:58:23',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => '微星 MSI',
                'description' => NULL,
                'location' => NULL,
                'contacts' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-01-19 11:58:32',
                'updated_at' => '2021-01-19 11:58:32',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => '金士顿 Kingston',
                'description' => NULL,
                'location' => NULL,
                'contacts' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-01-19 11:58:40',
                'updated_at' => '2021-01-19 11:58:40',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => '西部数据 WD',
                'description' => NULL,
                'location' => NULL,
                'contacts' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-01-19 11:58:47',
                'updated_at' => '2021-01-19 11:58:47',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => '希捷 Seagate',
                'description' => NULL,
                'location' => NULL,
                'contacts' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-01-19 11:59:18',
                'updated_at' => '2021-01-19 11:59:18',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => '华硕 ASUS',
                'description' => NULL,
                'location' => NULL,
                'contacts' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-01-19 11:59:40',
                'updated_at' => '2021-01-19 11:59:40',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => '联想 Lenovo',
                'description' => NULL,
                'location' => NULL,
                'contacts' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-01-19 11:59:48',
                'updated_at' => '2021-01-19 11:59:48',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => '惠普 HP/HPE',
                'description' => NULL,
                'location' => NULL,
                'contacts' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-01-19 11:59:57',
                'updated_at' => '2021-01-19 11:59:57',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => '华为 Huawei',
                'description' => NULL,
                'location' => NULL,
                'contacts' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-01-19 12:00:18',
                'updated_at' => '2021-01-19 12:00:18',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => '小米 MI',
                'description' => NULL,
                'location' => NULL,
                'contacts' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-01-19 12:00:27',
                'updated_at' => '2021-01-19 12:00:27',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => '荣耀 Honor',
                'description' => NULL,
                'location' => NULL,
                'contacts' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-01-19 17:00:41',
                'updated_at' => '2021-01-19 17:00:41',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => '七彩虹 Colorful',
                'description' => NULL,
                'location' => NULL,
                'contacts' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-01-19 17:01:00',
                'updated_at' => '2021-01-19 17:01:00',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => '影驰 Galaxy',
                'description' => NULL,
                'location' => NULL,
                'contacts' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-01-19 17:01:31',
                'updated_at' => '2021-01-19 17:01:31',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => '仲琳',
                'description' => NULL,
                'location' => NULL,
                'contacts' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-18 10:55:52',
                'updated_at' => '2021-03-18 10:55:52',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => '尹莉',
                'description' => NULL,
                'location' => NULL,
                'contacts' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-18 10:56:06',
                'updated_at' => '2021-03-18 10:56:06',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => '施振国',
                'description' => NULL,
                'location' => NULL,
                'contacts' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-18 10:58:40',
                'updated_at' => '2021-03-18 10:58:40',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => '冯桂芬',
                'description' => NULL,
                'location' => NULL,
                'contacts' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-18 10:58:40',
                'updated_at' => '2021-03-18 10:58:40',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => '文凤英',
                'description' => NULL,
                'location' => NULL,
                'contacts' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-18 10:59:08',
                'updated_at' => '2021-03-18 10:59:08',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => '鞠杰',
                'description' => NULL,
                'location' => NULL,
                'contacts' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-18 10:59:08',
                'updated_at' => '2021-03-18 10:59:08',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => '黎欢',
                'description' => NULL,
                'location' => NULL,
                'contacts' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-18 13:13:22',
                'updated_at' => '2021-03-18 13:13:22',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => '卓正诚',
                'description' => NULL,
                'location' => NULL,
                'contacts' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-18 13:13:22',
                'updated_at' => '2021-03-18 13:13:22',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => '蔺慧',
                'description' => NULL,
                'location' => NULL,
                'contacts' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-18 13:17:14',
                'updated_at' => '2021-03-18 13:17:14',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => '鲁昱然',
                'description' => NULL,
                'location' => NULL,
                'contacts' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-18 13:17:14',
                'updated_at' => '2021-03-18 13:17:14',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => '焦燕',
                'description' => NULL,
                'location' => NULL,
                'contacts' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-18 13:20:03',
                'updated_at' => '2021-03-18 13:20:03',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => '胡超',
                'description' => NULL,
                'location' => NULL,
                'contacts' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-18 13:20:03',
                'updated_at' => '2021-03-18 13:20:03',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => '顾颖',
                'description' => NULL,
                'location' => NULL,
                'contacts' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-18 13:20:15',
                'updated_at' => '2021-03-18 13:20:15',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => '涂建国',
                'description' => NULL,
                'location' => NULL,
                'contacts' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-18 13:20:15',
                'updated_at' => '2021-03-18 13:20:15',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => '夏亮',
                'description' => NULL,
                'location' => NULL,
                'contacts' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-18 21:05:58',
                'updated_at' => '2021-03-18 21:05:58',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => '毛宇',
                'description' => NULL,
                'location' => NULL,
                'contacts' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-24 08:18:38',
                'updated_at' => '2021-03-24 08:18:38',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => '丛瑶',
                'description' => NULL,
                'location' => NULL,
                'contacts' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-24 08:18:39',
                'updated_at' => '2021-03-24 08:18:39',
            ),
            34 => 
            array (
                'id' => 35,
                'name' => '阮淑兰',
                'description' => NULL,
                'location' => NULL,
                'contacts' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-24 08:18:39',
                'updated_at' => '2021-03-24 08:18:39',
            ),
            35 => 
            array (
                'id' => 36,
                'name' => '赖利',
                'description' => NULL,
                'location' => NULL,
                'contacts' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-24 08:18:39',
                'updated_at' => '2021-03-24 08:18:39',
            ),
        ));
        
        
    }
}