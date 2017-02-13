<?php

use App\Models\Subscription\SubscriptionCategory;
use Illuminate\Database\Seeder;

class SubscriptionCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        SubscriptionCategory::truncate();
        SubscriptionCategory::insert([
            ['name' => "Free Trial Packages"],
            ['name' => "Small to Medium Packages"],
            ['name' => "Large Enterprise Packages"]
        ]);
    }
}
