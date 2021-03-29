<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_users')->delete();
        
        \DB::table('admin_users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'username' => 'Administrator',
                'password' => '$2y$10$07nISInU7QznD4j1ofqol.TVKhEVjwIGxqkf.OF1gXpsTszyfeLMW',
                'name' => 'Administrator',
                'avatar' => NULL,
                'remember_token' => NULL,
                'department_id' => 0,
                'gender' => '无',
                'title' => NULL,
                'mobile' => NULL,
                'email' => NULL,
                'ad_tag' => 1,
                'extended_fields' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-29 10:15:57',
                'updated_at' => '2021-03-29 10:15:57',
            ),
            1 => 
            array (
                'id' => 2,
                'username' => 'Guest',
                'password' => '$2y$10$wPKIPe1QrO3B6Bh6svWaZeurS9yWHnd7TtzkZl65fl/.ormjjTXlG',
                'name' => 'Guest',
                'avatar' => NULL,
                'remember_token' => NULL,
                'department_id' => 0,
                'gender' => '无',
                'title' => NULL,
                'mobile' => NULL,
                'email' => NULL,
                'ad_tag' => 1,
                'extended_fields' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-29 10:15:57',
                'updated_at' => '2021-03-29 10:15:57',
            ),
            2 => 
            array (
                'id' => 3,
                'username' => '__SUNLOGIN_USER__',
                'password' => '$2y$10$3YbtNpsBzm50EtYDKoNpsuLkirBr6UtU7RWBR8UHrPTnioXCzMmnW',
                'name' => '__SUNLOGIN_USER__',
                'avatar' => NULL,
                'remember_token' => NULL,
                'department_id' => 0,
                'gender' => '无',
                'title' => NULL,
                'mobile' => NULL,
                'email' => NULL,
                'ad_tag' => 1,
                'extended_fields' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-29 10:15:57',
                'updated_at' => '2021-03-29 10:15:57',
            ),
            3 => 
            array (
                'id' => 4,
                'username' => 'krbtgt',
                'password' => '$2y$10$.kuoYjUc9h294sLwp65sxOKvCnoceMKjFHlHKMoVsn15wR6wNvLdK',
                'name' => 'krbtgt',
                'avatar' => NULL,
                'remember_token' => NULL,
                'department_id' => 0,
                'gender' => '无',
                'title' => NULL,
                'mobile' => NULL,
                'email' => NULL,
                'ad_tag' => 1,
                'extended_fields' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-29 10:15:57',
                'updated_at' => '2021-03-29 10:15:57',
            ),
            4 => 
            array (
                'id' => 5,
                'username' => 'distinctio_architecto',
                'password' => '$2y$04$8BCzxs9r/Ay9arMCrTGGyuc1A6kf6gy7Ebp/bJaatK0TMMgh1xM3y',
                'name' => '宁翔',
                'avatar' => NULL,
                'remember_token' => NULL,
                'department_id' => 1,
                'gender' => '男',
                'title' => NULL,
                'mobile' => NULL,
                'email' => NULL,
                'ad_tag' => 0,
                'extended_fields' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-29 13:54:03',
                'updated_at' => '2021-03-29 13:54:03',
            ),
            5 => 
            array (
                'id' => 6,
                'username' => 'sed.delectus',
                'password' => '$2y$04$H9h5BachVkfzjcs0R9PxwOs3qJTBRdHZRBx0vT6NqrTSFvzGWc0DC',
                'name' => '赖志新',
                'avatar' => NULL,
                'remember_token' => NULL,
                'department_id' => 1,
                'gender' => '男',
                'title' => NULL,
                'mobile' => NULL,
                'email' => NULL,
                'ad_tag' => 0,
                'extended_fields' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-29 13:54:04',
                'updated_at' => '2021-03-29 13:54:04',
            ),
            6 => 
            array (
                'id' => 7,
                'username' => 'qquibusdam',
                'password' => '$2y$04$EesXcGT5V/jrs8IGAjb8aebaVipo12TmrCB6FyIgRs43U3g5EUU/q',
                'name' => '杨欢',
                'avatar' => NULL,
                'remember_token' => NULL,
                'department_id' => 1,
                'gender' => '男',
                'title' => NULL,
                'mobile' => NULL,
                'email' => NULL,
                'ad_tag' => 0,
                'extended_fields' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-29 13:54:04',
                'updated_at' => '2021-03-29 13:54:04',
            ),
            7 => 
            array (
                'id' => 8,
                'username' => 'molestiae.et',
                'password' => '$2y$04$.qSbFJn.QXUEBR72AuwT9.mkIYmOwiPH/H3O.1/LCT6YUKvOn2Riq',
                'name' => '竺文',
                'avatar' => NULL,
                'remember_token' => NULL,
                'department_id' => 1,
                'gender' => '男',
                'title' => NULL,
                'mobile' => NULL,
                'email' => NULL,
                'ad_tag' => 0,
                'extended_fields' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-29 13:54:04',
                'updated_at' => '2021-03-29 13:54:04',
            ),
            8 => 
            array (
                'id' => 9,
                'username' => 'beatae.cum',
                'password' => '$2y$04$zH..dwhXAk7xPYHXsDdv0.LJQNWDL8C.ary.HZcuo1H3rw07yxLDW',
                'name' => '萧健',
                'avatar' => NULL,
                'remember_token' => NULL,
                'department_id' => 1,
                'gender' => '男',
                'title' => NULL,
                'mobile' => NULL,
                'email' => NULL,
                'ad_tag' => 0,
                'extended_fields' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-29 13:54:04',
                'updated_at' => '2021-03-29 13:54:04',
            ),
            9 => 
            array (
                'id' => 10,
                'username' => 'recusandae.libero',
                'password' => '$2y$04$jnH61hs6jAyGsTQefXfAX.XGOI8hWpiyUmxscOQv4BCnwgl3cDOWy',
                'name' => '常杨',
                'avatar' => NULL,
                'remember_token' => NULL,
                'department_id' => 1,
                'gender' => '男',
                'title' => NULL,
                'mobile' => NULL,
                'email' => NULL,
                'ad_tag' => 0,
                'extended_fields' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-29 13:54:04',
                'updated_at' => '2021-03-29 13:54:04',
            ),
            10 => 
            array (
                'id' => 11,
                'username' => 'fugit76',
                'password' => '$2y$04$8snGv4teiJe4YqG1X89MXOczgqMvTuB6CfkWoU0SBWBGtwF.AgEuG',
                'name' => '戴琳',
                'avatar' => NULL,
                'remember_token' => NULL,
                'department_id' => 1,
                'gender' => '男',
                'title' => NULL,
                'mobile' => NULL,
                'email' => NULL,
                'ad_tag' => 0,
                'extended_fields' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-29 13:54:04',
                'updated_at' => '2021-03-29 13:54:04',
            ),
            11 => 
            array (
                'id' => 12,
                'username' => 'voluptate_porro',
                'password' => '$2y$04$nQuhqEuI4nMLdjIw7pYa2O3SCWeZs3jjUmRO5xq0KNPGh7Edfw.o2',
                'name' => '董桂荣',
                'avatar' => NULL,
                'remember_token' => NULL,
                'department_id' => 1,
                'gender' => '男',
                'title' => NULL,
                'mobile' => NULL,
                'email' => NULL,
                'ad_tag' => 0,
                'extended_fields' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-03-29 13:54:04',
                'updated_at' => '2021-03-29 13:54:04',
            ),
        ));
        
        
    }
}