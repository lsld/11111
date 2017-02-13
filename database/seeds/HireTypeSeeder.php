<?php

use App\Models\HireType;

use Illuminate\Database\Seeder;

class HireTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        HireType::truncate();

        HireType::insert([
            [

                'type' => "hire type1",

            ],

            [

                'type' => "hire type2",

            ]

            ,

            [

                'type' => "hire type3",

            ]
        ]);
    }

}
