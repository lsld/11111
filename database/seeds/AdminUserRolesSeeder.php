<?php

use Illuminate\Database\Seeder;

class AdminUserRolesSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('admin_user_roles')->truncate();
        DB::table('admin_user_roles')->insert([
            ['label' => 'SUPER ADMIN'],
            ['label' => 'ADMIN'],
        ]);

    }
}