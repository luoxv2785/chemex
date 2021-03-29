<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminRoleUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_role_users')->delete();
        
        \DB::table('admin_role_users')->insert(array (
            0 => 
            array (
                'role_id' => 1,
                'user_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'role_id' => 1,
                'user_id' => 7,
                'created_at' => '2021-03-29 13:54:04',
                'updated_at' => '2021-03-29 13:54:04',
            ),
            2 => 
            array (
                'role_id' => 1,
                'user_id' => 8,
                'created_at' => '2021-03-29 13:54:04',
                'updated_at' => '2021-03-29 13:54:04',
            ),
            3 => 
            array (
                'role_id' => 1,
                'user_id' => 9,
                'created_at' => '2021-03-29 13:54:04',
                'updated_at' => '2021-03-29 13:54:04',
            ),
            4 => 
            array (
                'role_id' => 1,
                'user_id' => 10,
                'created_at' => '2021-03-29 13:54:04',
                'updated_at' => '2021-03-29 13:54:04',
            ),
            5 => 
            array (
                'role_id' => 1,
                'user_id' => 11,
                'created_at' => '2021-03-29 13:54:04',
                'updated_at' => '2021-03-29 13:54:04',
            ),
            6 => 
            array (
                'role_id' => 1,
                'user_id' => 12,
                'created_at' => '2021-03-29 13:54:04',
                'updated_at' => '2021-03-29 13:54:04',
            ),
            7 => 
            array (
                'role_id' => 1,
                'user_id' => 45,
                'created_at' => '2021-03-18 09:12:02',
                'updated_at' => '2021-03-18 09:12:02',
            ),
            8 => 
            array (
                'role_id' => 1,
                'user_id' => 48,
                'created_at' => '2021-03-18 09:12:35',
                'updated_at' => '2021-03-18 09:12:35',
            ),
            9 => 
            array (
                'role_id' => 1,
                'user_id' => 51,
                'created_at' => '2021-03-18 09:13:39',
                'updated_at' => '2021-03-18 09:13:39',
            ),
            10 => 
            array (
                'role_id' => 1,
                'user_id' => 54,
                'created_at' => '2021-03-18 09:14:12',
                'updated_at' => '2021-03-18 09:14:12',
            ),
            11 => 
            array (
                'role_id' => 1,
                'user_id' => 55,
                'created_at' => '2021-03-18 09:43:48',
                'updated_at' => '2021-03-18 09:43:48',
            ),
            12 => 
            array (
                'role_id' => 1,
                'user_id' => 56,
                'created_at' => '2021-03-18 09:43:50',
                'updated_at' => '2021-03-18 09:43:50',
            ),
            13 => 
            array (
                'role_id' => 1,
                'user_id' => 57,
                'created_at' => '2021-03-18 09:44:27',
                'updated_at' => '2021-03-18 09:44:27',
            ),
            14 => 
            array (
                'role_id' => 1,
                'user_id' => 58,
                'created_at' => '2021-03-18 09:57:33',
                'updated_at' => '2021-03-18 09:57:33',
            ),
            15 => 
            array (
                'role_id' => 1,
                'user_id' => 59,
                'created_at' => '2021-03-18 09:58:22',
                'updated_at' => '2021-03-18 09:58:22',
            ),
            16 => 
            array (
                'role_id' => 1,
                'user_id' => 60,
                'created_at' => '2021-03-18 10:02:06',
                'updated_at' => '2021-03-18 10:02:06',
            ),
            17 => 
            array (
                'role_id' => 1,
                'user_id' => 61,
                'created_at' => '2021-03-18 10:03:13',
                'updated_at' => '2021-03-18 10:03:13',
            ),
            18 => 
            array (
                'role_id' => 1,
                'user_id' => 62,
                'created_at' => '2021-03-18 10:03:19',
                'updated_at' => '2021-03-18 10:03:19',
            ),
            19 => 
            array (
                'role_id' => 1,
                'user_id' => 63,
                'created_at' => '2021-03-18 10:03:25',
                'updated_at' => '2021-03-18 10:03:25',
            ),
            20 => 
            array (
                'role_id' => 1,
                'user_id' => 66,
                'created_at' => '2021-03-18 10:03:41',
                'updated_at' => '2021-03-18 10:03:41',
            ),
            21 => 
            array (
                'role_id' => 1,
                'user_id' => 69,
                'created_at' => '2021-03-18 10:15:17',
                'updated_at' => '2021-03-18 10:15:17',
            ),
            22 => 
            array (
                'role_id' => 1,
                'user_id' => 70,
                'created_at' => '2021-03-18 10:15:17',
                'updated_at' => '2021-03-18 10:15:17',
            ),
            23 => 
            array (
                'role_id' => 1,
                'user_id' => 73,
                'created_at' => '2021-03-18 10:15:29',
                'updated_at' => '2021-03-18 10:15:29',
            ),
            24 => 
            array (
                'role_id' => 1,
                'user_id' => 74,
                'created_at' => '2021-03-18 10:15:29',
                'updated_at' => '2021-03-18 10:15:29',
            ),
            25 => 
            array (
                'role_id' => 1,
                'user_id' => 77,
                'created_at' => '2021-03-18 10:15:35',
                'updated_at' => '2021-03-18 10:15:35',
            ),
            26 => 
            array (
                'role_id' => 1,
                'user_id' => 78,
                'created_at' => '2021-03-18 10:15:36',
                'updated_at' => '2021-03-18 10:15:36',
            ),
            27 => 
            array (
                'role_id' => 1,
                'user_id' => 81,
                'created_at' => '2021-03-18 10:15:46',
                'updated_at' => '2021-03-18 10:15:46',
            ),
            28 => 
            array (
                'role_id' => 1,
                'user_id' => 82,
                'created_at' => '2021-03-18 10:15:46',
                'updated_at' => '2021-03-18 10:15:46',
            ),
            29 => 
            array (
                'role_id' => 1,
                'user_id' => 85,
                'created_at' => '2021-03-18 10:15:52',
                'updated_at' => '2021-03-18 10:15:52',
            ),
            30 => 
            array (
                'role_id' => 1,
                'user_id' => 86,
                'created_at' => '2021-03-18 10:15:52',
                'updated_at' => '2021-03-18 10:15:52',
            ),
            31 => 
            array (
                'role_id' => 1,
                'user_id' => 89,
                'created_at' => '2021-03-18 10:55:52',
                'updated_at' => '2021-03-18 10:55:52',
            ),
            32 => 
            array (
                'role_id' => 1,
                'user_id' => 90,
                'created_at' => '2021-03-18 10:55:52',
                'updated_at' => '2021-03-18 10:55:52',
            ),
            33 => 
            array (
                'role_id' => 1,
                'user_id' => 93,
                'created_at' => '2021-03-18 10:56:06',
                'updated_at' => '2021-03-18 10:56:06',
            ),
            34 => 
            array (
                'role_id' => 1,
                'user_id' => 94,
                'created_at' => '2021-03-18 10:56:06',
                'updated_at' => '2021-03-18 10:56:06',
            ),
            35 => 
            array (
                'role_id' => 1,
                'user_id' => 97,
                'created_at' => '2021-03-18 10:58:39',
                'updated_at' => '2021-03-18 10:58:39',
            ),
            36 => 
            array (
                'role_id' => 1,
                'user_id' => 98,
                'created_at' => '2021-03-18 10:58:39',
                'updated_at' => '2021-03-18 10:58:39',
            ),
            37 => 
            array (
                'role_id' => 1,
                'user_id' => 99,
                'created_at' => '2021-03-18 10:58:40',
                'updated_at' => '2021-03-18 10:58:40',
            ),
            38 => 
            array (
                'role_id' => 1,
                'user_id' => 102,
                'created_at' => '2021-03-18 10:59:08',
                'updated_at' => '2021-03-18 10:59:08',
            ),
            39 => 
            array (
                'role_id' => 1,
                'user_id' => 103,
                'created_at' => '2021-03-18 10:59:08',
                'updated_at' => '2021-03-18 10:59:08',
            ),
            40 => 
            array (
                'role_id' => 1,
                'user_id' => 104,
                'created_at' => '2021-03-18 10:59:08',
                'updated_at' => '2021-03-18 10:59:08',
            ),
            41 => 
            array (
                'role_id' => 1,
                'user_id' => 107,
                'created_at' => '2021-03-18 13:13:22',
                'updated_at' => '2021-03-18 13:13:22',
            ),
            42 => 
            array (
                'role_id' => 1,
                'user_id' => 108,
                'created_at' => '2021-03-18 13:13:22',
                'updated_at' => '2021-03-18 13:13:22',
            ),
            43 => 
            array (
                'role_id' => 1,
                'user_id' => 109,
                'created_at' => '2021-03-18 13:13:22',
                'updated_at' => '2021-03-18 13:13:22',
            ),
            44 => 
            array (
                'role_id' => 1,
                'user_id' => 112,
                'created_at' => '2021-03-18 13:17:14',
                'updated_at' => '2021-03-18 13:17:14',
            ),
            45 => 
            array (
                'role_id' => 1,
                'user_id' => 113,
                'created_at' => '2021-03-18 13:17:14',
                'updated_at' => '2021-03-18 13:17:14',
            ),
            46 => 
            array (
                'role_id' => 1,
                'user_id' => 114,
                'created_at' => '2021-03-18 13:17:14',
                'updated_at' => '2021-03-18 13:17:14',
            ),
            47 => 
            array (
                'role_id' => 1,
                'user_id' => 117,
                'created_at' => '2021-03-18 13:19:45',
                'updated_at' => '2021-03-18 13:19:45',
            ),
            48 => 
            array (
                'role_id' => 1,
                'user_id' => 120,
                'created_at' => '2021-03-18 13:19:59',
                'updated_at' => '2021-03-18 13:19:59',
            ),
            49 => 
            array (
                'role_id' => 1,
                'user_id' => 123,
                'created_at' => '2021-03-18 13:20:03',
                'updated_at' => '2021-03-18 13:20:03',
            ),
            50 => 
            array (
                'role_id' => 1,
                'user_id' => 124,
                'created_at' => '2021-03-18 13:20:03',
                'updated_at' => '2021-03-18 13:20:03',
            ),
            51 => 
            array (
                'role_id' => 1,
                'user_id' => 125,
                'created_at' => '2021-03-18 13:20:03',
                'updated_at' => '2021-03-18 13:20:03',
            ),
            52 => 
            array (
                'role_id' => 1,
                'user_id' => 128,
                'created_at' => '2021-03-18 13:20:10',
                'updated_at' => '2021-03-18 13:20:10',
            ),
            53 => 
            array (
                'role_id' => 1,
                'user_id' => 131,
                'created_at' => '2021-03-18 13:20:14',
                'updated_at' => '2021-03-18 13:20:14',
            ),
            54 => 
            array (
                'role_id' => 1,
                'user_id' => 132,
                'created_at' => '2021-03-18 13:20:15',
                'updated_at' => '2021-03-18 13:20:15',
            ),
            55 => 
            array (
                'role_id' => 1,
                'user_id' => 133,
                'created_at' => '2021-03-18 13:20:15',
                'updated_at' => '2021-03-18 13:20:15',
            ),
            56 => 
            array (
                'role_id' => 1,
                'user_id' => 136,
                'created_at' => '2021-03-18 20:50:16',
                'updated_at' => '2021-03-18 20:50:16',
            ),
            57 => 
            array (
                'role_id' => 1,
                'user_id' => 139,
                'created_at' => '2021-03-18 21:05:58',
                'updated_at' => '2021-03-18 21:05:58',
            ),
            58 => 
            array (
                'role_id' => 1,
                'user_id' => 140,
                'created_at' => '2021-03-18 21:05:58',
                'updated_at' => '2021-03-18 21:05:58',
            ),
            59 => 
            array (
                'role_id' => 1,
                'user_id' => 143,
                'created_at' => '2021-03-24 08:16:26',
                'updated_at' => '2021-03-24 08:16:26',
            ),
            60 => 
            array (
                'role_id' => 1,
                'user_id' => 144,
                'created_at' => '2021-03-24 08:16:27',
                'updated_at' => '2021-03-24 08:16:27',
            ),
            61 => 
            array (
                'role_id' => 1,
                'user_id' => 145,
                'created_at' => '2021-03-24 08:16:27',
                'updated_at' => '2021-03-24 08:16:27',
            ),
            62 => 
            array (
                'role_id' => 1,
                'user_id' => 147,
                'created_at' => '2021-03-24 08:16:27',
                'updated_at' => '2021-03-24 08:16:27',
            ),
            63 => 
            array (
                'role_id' => 1,
                'user_id' => 148,
                'created_at' => '2021-03-24 08:16:27',
                'updated_at' => '2021-03-24 08:16:27',
            ),
            64 => 
            array (
                'role_id' => 1,
                'user_id' => 151,
                'created_at' => '2021-03-24 08:18:38',
                'updated_at' => '2021-03-24 08:18:38',
            ),
            65 => 
            array (
                'role_id' => 1,
                'user_id' => 152,
                'created_at' => '2021-03-24 08:18:38',
                'updated_at' => '2021-03-24 08:18:38',
            ),
            66 => 
            array (
                'role_id' => 1,
                'user_id' => 153,
                'created_at' => '2021-03-24 08:18:38',
                'updated_at' => '2021-03-24 08:18:38',
            ),
            67 => 
            array (
                'role_id' => 1,
                'user_id' => 154,
                'created_at' => '2021-03-24 08:18:39',
                'updated_at' => '2021-03-24 08:18:39',
            ),
            68 => 
            array (
                'role_id' => 1,
                'user_id' => 155,
                'created_at' => '2021-03-24 08:18:39',
                'updated_at' => '2021-03-24 08:18:39',
            ),
            69 => 
            array (
                'role_id' => 1,
                'user_id' => 156,
                'created_at' => '2021-03-24 08:18:39',
                'updated_at' => '2021-03-24 08:18:39',
            ),
            70 => 
            array (
                'role_id' => 1,
                'user_id' => 166,
                'created_at' => '2021-03-27 21:19:49',
                'updated_at' => '2021-03-27 21:19:49',
            ),
        ));
        
        
    }
}