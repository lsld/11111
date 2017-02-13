<?php

use App\Models\ResourceType;

use Illuminate\Database\Seeder;

class ResourceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        ResourceType::truncate();

        ResourceType::insert([
            [

                'name' => "resource type1",

            ],

            [

                'name' => "resource type2",

            ],

            [

                'name' => "resource type3",

            ],

        ]);
    }


}
