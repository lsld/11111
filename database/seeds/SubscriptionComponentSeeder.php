<?php

use App\Models\Subscription\SubscriptionComponent;
use Illuminate\Database\Seeder;

class SubscriptionComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        SubscriptionComponent::truncate();
        SubscriptionComponent::insert([
            ['name' => "Machines", 'slug' => 'machines'],
            ['name' => "Contracting", 'slug' => 'contracting'],
            ['name' => "Material/Fill", 'slug' => 'material_fill'],
            ['name' => "Material", 'slug' => 'material']
        ]);
    }
}
