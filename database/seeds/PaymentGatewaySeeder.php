<?php

use App\Models\PaymentGateway;
use Illuminate\Database\Seeder;

class PaymentGatewaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        PaymentGateway::truncate();
        PaymentGateway::insert([
            [
                'name' => 'Common Web',
                'slug' => 'common_web',
            ],
            [
                'name' => 'Stripe',
                'slug' => 'stripe',
            ],
        ]);
    }
}
