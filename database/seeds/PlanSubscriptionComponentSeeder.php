<?php

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanSubscriptionComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $plan1 = Plan::find(1);
        $plan1->subscriptionComponents()->detach();
        $plan1->subscriptionComponents()->attach([1 => ['quantity' => 1]]);
        $plan1->subscriptionComponents()->attach([2 => ['quantity' => 1]]);
        $plan1->subscriptionComponents()->attach([3 => ['quantity' => 1]]);
        $plan1->subscriptionComponents()->attach([4 => ['quantity' => 1]]);

        $plan2 = Plan::find(2);
        $plan2->subscriptionComponents()->detach();
        $plan2->subscriptionComponents()->attach([1 => ['quantity' => 1]]);
        $plan2->subscriptionComponents()->attach([2 => ['quantity' => 1]]);
        $plan2->subscriptionComponents()->attach([3 => ['quantity' => 3]]);
        $plan2->subscriptionComponents()->attach([4 => ['quantity' => 3]]);

        $plan3 = Plan::find(3);
        $plan3->subscriptionComponents()->detach();
        $plan3->subscriptionComponents()->attach([1 => ['quantity' => 5]]);
        $plan3->subscriptionComponents()->attach([2 => ['quantity' => 2]]);
        $plan3->subscriptionComponents()->attach([3 => ['quantity' => 10]]);
        $plan3->subscriptionComponents()->attach([4 => ['quantity' => 10]]);

        $plan4 = Plan::find(4);
        $plan4->subscriptionComponents()->detach();
        $plan4->subscriptionComponents()->attach([1 => ['quantity' => 10]]);
        $plan4->subscriptionComponents()->attach([2 => ['quantity' => 4]]);
        $plan4->subscriptionComponents()->attach([3 => ['quantity' => 20]]);
        $plan4->subscriptionComponents()->attach([4 => ['quantity' => 20]]);


        $plan5 = Plan::find(5);
        $plan5->subscriptionComponents()->detach();
        $plan5->subscriptionComponents()->attach([1 => ['quantity' => 50]]);
        $plan5->subscriptionComponents()->attach([2 => ['quantity' => 10]]);
        $plan5->subscriptionComponents()->attach([3 => ['quantity' => 120]]);
        $plan5->subscriptionComponents()->attach([4 => ['quantity' => 120]]);

        $plan6 = Plan::find(6);
        $plan6->subscriptionComponents()->detach();
        $plan6->subscriptionComponents()->attach([1 => ['quantity' => 75]]);
        $plan6->subscriptionComponents()->attach([2 => ['quantity' => 15]]);
        $plan6->subscriptionComponents()->attach([3 => ['quantity' => 150]]);
        $plan6->subscriptionComponents()->attach([4 => ['quantity' => 150]]);

        $plan7 = Plan::find(7);
        $plan7->subscriptionComponents()->detach();
        $plan7->subscriptionComponents()->attach([1 => ['quantity' => 0, 'is_limit' => false]]);
        $plan7->subscriptionComponents()->attach([2 => ['quantity' => 0, 'is_limit' => false]]);
        $plan7->subscriptionComponents()->attach([3 => ['quantity' => 0, 'is_limit' => false]]);
        $plan7->subscriptionComponents()->attach([4 => ['quantity' => 0, 'is_limit' => false]]);
    }
}
