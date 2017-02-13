<?php


use App\Models\WorkTypes;

use Illuminate\Database\Seeder;

class WorkTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        WorkTypes::truncate();

        WorkTypes::insert([
            [

                'name' => "work type1",

            ],

            [

                'name' => "work type2",

            ],

            [

                'name' => "work type3",

            ],

        ]);
    }

}
