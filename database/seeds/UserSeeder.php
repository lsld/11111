<?php

use Illuminate\Database\Seeder;
use App\Constants\UserStatus;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { /*

        Role::truncate();
        Role::insert([
            [
                'first_name'    =>  'ccf.admin',
                'last_name'     =>  'ccf',
                'username'      =>  'admin',
                'email'         =>  'admin@ccf.com',
                'password'      =>  bcrypt('secret'),
                'avatar'        =>  'default.jpg',
                'phone'         =>  null,
                'role_id'       =>  1,
                'status'        =>  UserStatus::ACTIVATED
            ]
        ]);*/
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->insert([
            'first_name'    =>  'admin',
            'last_name'     =>  'ccf',
            'username'      =>  'ccf.admin',
            'email'         =>  'admin@ccf.com',
            'password'      =>  bcrypt('secret'),
            'avatar'        =>  'default.jpg',
            'phone'         =>  null,
            'role_id'       =>  1,
            'status'        =>  UserStatus::ACTIVATED
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
