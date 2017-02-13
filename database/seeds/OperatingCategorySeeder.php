<?php

use App\Models\OperatingCategory;
use Illuminate\Database\Seeder;

class OperatingCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        OperatingCategory::truncate();
        OperatingCategory::insert([

                ['name' => 'Demolition'],
                ['name' => 'Earthworks'],
                ['name' => 'electricity distribution'],
                ['name' => 'Enviornmental Management'],
                ['name' => 'equipment sales '],
                ['name' => 'gas pipelines'],
                ['name' => 'general excavation'],
                ['name' => 'irrigation infrastructure'],
                ['name' => 'land development '],
                ['name' => 'Landscaping'],
                ['name' => 'Plant hire'],
                ['name' => 'Prefessional servcies- insurance'],
                ['name' => 'professional services legal'],
                ['name' => 'quarrying'],
                ['name' => 'roads and bridges'],
                ['name' => 'sewer treatment and reticulation'],
                ['name' => 'Suppleirs of pipes and steel'],
                ['name' => 'suppliers of fuels and lubricants'],
                ['name' => '"suppliers of quarry products, concrete and bituminous"'],
                ['name' => 'telecommunications infrastructure'],
                ['name' => 'transport/Haulage '],
                ['name' => 'water treatment and reticulation']
            ]
        );
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
