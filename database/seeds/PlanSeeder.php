<?php

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Plan::truncate();
        Plan::insert([
            [
                'name' => "Trial",
                "price_member" => 0,
                "price_non_member" => 0,
                "subscription_category_id" => 1,
                'is_trial' => true,
                'trial_value' => 1,
                'trial_unit' => 'month',
            ],
            [
                'name' => "Small",
                "price_member" => 272,
                "price_non_member" => 340,
                "subscription_category_id" => 2,
                'is_trial' => false,
                'trial_value' => 0,
                'trial_unit' => null,
            ],
            [
                'name' => "Small",
                "price_member" => 1119,
                "price_non_member" => 1399,
                "subscription_category_id" => 2,
                'is_trial' => false,
                'trial_value' => 0,
                'trial_unit' => null,
            ],
            [
                'name' => "Small",
                "price_member" => 1519,
                "price_non_member" => 1899,
                "subscription_category_id" => 2,
                'is_trial' => false,
                'trial_value' => 0,
                'trial_unit' => null,
            ],
            [
                'name' => "Large",
                "price_member" => 3359,
                "price_non_member" => 4119,
                "subscription_category_id" => 3,
                'is_trial' => false,
                'trial_value' => 0,
                'trial_unit' => null,
            ],
            [
                'name' => "Large",
                "price_member" => 3759,
                "price_non_member" => 4699,
                "subscription_category_id" => 3,
                'is_trial' => false,
                'trial_value' => 0,
                'trial_unit' => null,
            ],
            [
                'name' => "Large",
                "price_member" => 6799,
                "price_non_member" => 8499,
                "subscription_category_id" => 3,
                'is_trial' => false,
                'trial_value' => 0,
                'trial_unit' => null,
            ]
        ]);
    }
}
