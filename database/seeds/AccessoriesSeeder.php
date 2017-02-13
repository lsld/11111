<?php

use App\Models\Accessories;

use Illuminate\Database\Seeder;

class AccessoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Accessories::truncate();

        Accessories::insert([
            [

                'name' => "accessory1",

            ],

            [

                'name' => "accessory2",

            ],

            [

                'name' => "accessory3",

            ],

        ]);
    }

}
