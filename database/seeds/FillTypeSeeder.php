<?php


use App\Models\FillType;

use Illuminate\Database\Seeder;

class FillTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        FillType::truncate();

        FillType::insert([

            ['name' => 'Any'],
            ['name' => 'Boulders'],
            ['name' => 'Clean Fill'],
            ['name' => 'Compost'],
            ['name' => 'Sand w/ Clay'],
            ['name' => '"Top Soil, Pulverized"'],
            ['name' => '"Top Soil, Screened"'],
            ['name' => 'Recycle mix'],
            ['name' => 'Clay'],
            ['name' => 'Demo Material'],
            ['name' => 'Gravel'],
            ['name' => 'River Rock'],
            ['name' => 'Sand'],
            ['name' => 'Mulch'],
            ['name' => 'Mixed Soils'],
            ['name' => 'Loam'],
            ['name' => 'Silt'],
            ['name' => 'Sod'],
            ['name' => 'Wood chips'],
            ['name' => 'Clean compatible']
            
        ]);
    }
}
