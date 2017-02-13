<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Role::truncate();
        Role::insert([
                ['name' => "Super Admin" , "slug"=>"super_admin"],
                ['name' => "Admin" , "slug"=>"admin"],
                ['name' => "Supplier" , "slug"=>"supplier"],
                ['name' => "Hirer" , "slug"=>"hirer"],
            ]
        );
    }
}
