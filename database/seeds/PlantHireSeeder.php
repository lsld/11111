<?php

use Illuminate\Database\Seeder;
use App\Models\PlantHire;

class PlantHireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        PlantHire::truncate();
        PlantHire::insert([
            [
                'main_category' => 1,
                'hire_type_id' => 2,
                //'accessory_id' => 1,
                'tenant_id' => 1,
                'description' => "Description 1",
                'quantity' => 5,
                'job_requests_id' => 1,
                'job_type' => 1,
                'company_id' => 1
            ],
            [
                'main_category' => 2,
                'hire_type_id' => 2,
                //'accessory_id' => 1,
                'tenant_id' => 1,
                'description' => "Description 2",
                'quantity' => 7,
                'job_requests_id' => 2,
                'job_type' => 1,
                'company_id' => 1
            ],
            [
                'main_category' => 1,
                'hire_type_id' => 1,
                //'accessory_id' => 1,
                'tenant_id' => 1,
                'description' => "Description 3",
                'quantity' => 10,
                'job_requests_id' => 3,
                'job_type' => 1,
                'company_id' => 1
            ]
        ]);
    }
}
