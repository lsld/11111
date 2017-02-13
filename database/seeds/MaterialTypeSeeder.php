<?php

use Illuminate\Database\Seeder;
use App\Models\MaterialType;

class MaterialTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        MaterialType::truncate();

        MaterialType::insert([

            [
                'name' => "Concrete Products",
            ],
            [
                'name' => "Piping and pipe fittings",
            ],
            [
                'name' => "Steel Products",
            ],
            [
                'name' => "Site Accomodation",
            ],
            [
                'name' => "crushed rock",
            ],
            [
                'name' => "Road signage",
            ],
            [
                'name' => "Road Barriers",
            ],
            [
                'name' => "Materials for Recycling",
            ],
            [
                'name' => "Timber products",
            ],
            [
                'name' => "Safety Equipment",
            ],
            [
                'name' => "Landscaping materials",
            ],
            [
                'name' => "Street/road hardware",
            ],
            [
                'name' => "Ground engaging tools",
            ],
            [
                'name' => "Hand Tools",
            ],
            [
                'name' => "Small Powered plant",
            ],
            [
                'name' => "Earth Movinmg Equipment Accessories",
            ],
            [
                'name' => "Accessories",
            ],
            [
                'name' => "Earth moving Equipment spares",
            ],

        ]);
    }
}
















