<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DeviceCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('device_categories')->delete();
        
        \DB::table('device_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '台式机',
                'description' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-01-19 19:18:51',
                'updated_at' => '2021-01-19 19:18:51',
                'depreciation_rule_id' => NULL,
                'parent_id' => NULL,
                'order' => 0,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '笔记本',
                'description' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-01-19 19:18:56',
                'updated_at' => '2021-01-19 19:18:56',
                'depreciation_rule_id' => NULL,
                'parent_id' => NULL,
                'order' => 0,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => '服务器',
                'description' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-01-19 19:19:01',
                'updated_at' => '2021-01-19 19:19:01',
                'depreciation_rule_id' => NULL,
                'parent_id' => NULL,
                'order' => 0,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => '交换机',
                'description' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-01-19 19:19:05',
                'updated_at' => '2021-01-19 19:19:05',
                'depreciation_rule_id' => NULL,
                'parent_id' => NULL,
                'order' => 0,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => '显示器',
                'description' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-01-19 19:19:09',
                'updated_at' => '2021-01-19 19:19:09',
                'depreciation_rule_id' => NULL,
                'parent_id' => NULL,
                'order' => 0,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => '路由器',
                'description' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-01-19 19:19:14',
                'updated_at' => '2021-01-19 19:19:14',
                'depreciation_rule_id' => NULL,
                'parent_id' => NULL,
                'order' => 0,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => '打印机',
                'description' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-01-19 19:19:21',
                'updated_at' => '2021-01-19 19:19:21',
                'depreciation_rule_id' => NULL,
                'parent_id' => NULL,
                'order' => 0,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => '扫描仪',
                'description' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-01-19 19:19:26',
                'updated_at' => '2021-01-19 19:19:26',
                'depreciation_rule_id' => NULL,
                'parent_id' => NULL,
                'order' => 0,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => '复印机',
                'description' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-01-19 19:19:30',
                'updated_at' => '2021-01-19 19:19:30',
                'depreciation_rule_id' => NULL,
                'parent_id' => NULL,
                'order' => 0,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => '平板电脑',
                'description' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-01-19 19:19:42',
                'updated_at' => '2021-01-19 19:19:42',
                'depreciation_rule_id' => NULL,
                'parent_id' => NULL,
                'order' => 0,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'PDA',
                'description' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-01-19 19:19:48',
                'updated_at' => '2021-01-19 19:19:48',
                'depreciation_rule_id' => NULL,
                'parent_id' => NULL,
                'order' => 0,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => '倪欣',
                'description' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-18 10:55:52',
                'updated_at' => '2021-03-18 10:55:52',
                'depreciation_rule_id' => NULL,
                'parent_id' => NULL,
                'order' => 0,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => '余辉',
                'description' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-18 10:56:06',
                'updated_at' => '2021-03-18 10:56:06',
                'depreciation_rule_id' => NULL,
                'parent_id' => NULL,
                'order' => 0,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => '窦超',
                'description' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-18 10:58:39',
                'updated_at' => '2021-03-18 10:58:39',
                'depreciation_rule_id' => NULL,
                'parent_id' => NULL,
                'order' => 0,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => '郭红',
                'description' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-18 10:58:40',
                'updated_at' => '2021-03-18 10:58:40',
                'depreciation_rule_id' => NULL,
                'parent_id' => NULL,
                'order' => 0,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => '扬珺',
                'description' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-18 10:59:08',
                'updated_at' => '2021-03-18 10:59:08',
                'depreciation_rule_id' => NULL,
                'parent_id' => NULL,
                'order' => 0,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => '朱冬梅',
                'description' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-18 10:59:08',
                'updated_at' => '2021-03-18 10:59:08',
                'depreciation_rule_id' => NULL,
                'parent_id' => NULL,
                'order' => 0,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => '阮建军',
                'description' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-18 13:13:22',
                'updated_at' => '2021-03-18 13:13:22',
                'depreciation_rule_id' => NULL,
                'parent_id' => NULL,
                'order' => 0,
            ),
            18 => 
            array (
                'id' => 19,
                'name' => '仲爱华',
                'description' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-18 13:13:22',
                'updated_at' => '2021-03-18 13:13:22',
                'depreciation_rule_id' => NULL,
                'parent_id' => NULL,
                'order' => 0,
            ),
            19 => 
            array (
                'id' => 20,
                'name' => '邓凤兰',
                'description' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-18 13:17:14',
                'updated_at' => '2021-03-18 13:17:14',
                'depreciation_rule_id' => NULL,
                'parent_id' => NULL,
                'order' => 0,
            ),
            20 => 
            array (
                'id' => 21,
                'name' => '柏欢',
                'description' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-18 13:17:14',
                'updated_at' => '2021-03-18 13:17:14',
                'depreciation_rule_id' => NULL,
                'parent_id' => NULL,
                'order' => 0,
            ),
            21 => 
            array (
                'id' => 22,
                'name' => '项波',
                'description' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-18 13:20:03',
                'updated_at' => '2021-03-18 13:20:03',
                'depreciation_rule_id' => NULL,
                'parent_id' => NULL,
                'order' => 0,
            ),
            22 => 
            array (
                'id' => 23,
                'name' => '梅珺',
                'description' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-18 13:20:03',
                'updated_at' => '2021-03-18 13:20:03',
                'depreciation_rule_id' => NULL,
                'parent_id' => NULL,
                'order' => 0,
            ),
            23 => 
            array (
                'id' => 24,
                'name' => '郑峰',
                'description' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-18 13:20:15',
                'updated_at' => '2021-03-18 13:20:15',
                'depreciation_rule_id' => NULL,
                'parent_id' => NULL,
                'order' => 0,
            ),
            24 => 
            array (
                'id' => 25,
                'name' => '裴建华',
                'description' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-18 13:20:15',
                'updated_at' => '2021-03-18 13:20:15',
                'depreciation_rule_id' => NULL,
                'parent_id' => NULL,
                'order' => 0,
            ),
            25 => 
            array (
                'id' => 26,
                'name' => '费艳',
                'description' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-18 21:05:58',
                'updated_at' => '2021-03-18 21:05:58',
                'depreciation_rule_id' => NULL,
                'parent_id' => NULL,
                'order' => 0,
            ),
            26 => 
            array (
                'id' => 27,
                'name' => '童瑜',
                'description' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-24 08:18:38',
                'updated_at' => '2021-03-24 08:18:38',
                'depreciation_rule_id' => NULL,
                'parent_id' => NULL,
                'order' => 0,
            ),
            27 => 
            array (
                'id' => 28,
                'name' => '成宇',
                'description' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-24 08:18:38',
                'updated_at' => '2021-03-24 08:18:38',
                'depreciation_rule_id' => NULL,
                'parent_id' => NULL,
                'order' => 0,
            ),
            28 => 
            array (
                'id' => 29,
                'name' => '宫文娟',
                'description' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-24 08:18:39',
                'updated_at' => '2021-03-24 08:18:39',
                'depreciation_rule_id' => NULL,
                'parent_id' => NULL,
                'order' => 0,
            ),
            29 => 
            array (
                'id' => 30,
                'name' => '汪楼',
                'description' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-24 08:18:39',
                'updated_at' => '2021-03-24 08:18:39',
                'depreciation_rule_id' => NULL,
                'parent_id' => NULL,
                'order' => 0,
            ),
        ));
        
        
    }
}