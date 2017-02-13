<?php

use App\Models\JobTypes;

use Illuminate\Database\Seeder;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        JobTypes::truncate();

        JobTypes::insert([
            [
                'name' => "Plant Hire",
            ],
            [
                'name' => "Constructing",
            ],
            [
                'name' => "Material",
            ],
            [
                'name' => "Fill",
            ],
        ]);
    }
}
