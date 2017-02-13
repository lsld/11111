<?php

use App\Models\States;
use Illuminate\Database\Seeder;

class StatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        States::truncate();
        States::insert([
            ['name' => "New South Wales",'short_code' => "NSW"],
            ['name' => "Queensland", 'short_code' => "QLD"],
            ['name' => "South Australia", 'short_code' => "SA"],
            ['name' => "Tasmania", 'short_code' => "TAS"],
            ['name' => "Victoria", 'short_code' => "VIC"],
            ['name' => "Western Australia", 'short_code' => "WA"],
            ]
        );
    }
}

