<?php
use App\Models\ItemCategories;

use Illuminate\Database\Seeder;

class ItemCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        ItemCategories::truncate();

        ItemCategories::insert([
            [
                    'type' => "item type1",
                    'name' => "item type name1",
                    'description' => "item type1 Description",
            ],

            [
                'type' => "item type2",
                'name' => "item type name2",
                'description' => "item type2 Description",
            ],

            [
                'type' => "item type3",
                'name' => "item type name3",
                'description' => "item type3 Description",
            ],
    ]);
    }
}
