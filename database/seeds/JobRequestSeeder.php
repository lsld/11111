<?php

use Illuminate\Database\Seeder;
use App\Models\JobRequests;

class JobRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        JobRequests::truncate();
        JobRequests::insert([
            [
                'entity_id' => 1,
                'entity_type' => "Hire",
                'duration' => "1",
                'street_address' => "street_address",
                'suburb' => "suburb",
                'post_code' => "11111",
                'description' => "Description 1",
                'expiry_date' => "2016-12-20",
                'job_type_id' => 1,
                'state_id' => 1,
                'regions_id' => 1,
                'user_id' => 1,
                'required_date' => "2016-12-15",
                'status' => "pending"

            ],
            [
                'entity_id' => 1,
                'entity_type' => "Hire",
                'duration' => "1",
                'street_address' => "street_address",
                'suburb' => "suburb",
                'post_code' => "22222",
                'description' => "Description 2",
                'expiry_date' => "2016-12-25",
                'job_type_id' => 1,
                'state_id' => 3,
                'regions_id' => 1,
                'user_id' => 1,
                'required_date' => "2016-12-10",
                'status' => "pending"
            ],
            [
                'entity_id' => 1,
                'entity_type' => "Hire",
                'duration' => "1",
                'street_address' => "street_address",
                'suburb' => "suburb",
                'post_code' => "11111",
                'description' => "Description 3",
                'expiry_date' => "2016-12-15",
                'job_type_id' => 1,
                'state_id' => 2,
                'regions_id' => 1,
                'user_id' => 1,
                'required_date' => "2016-12-5",
                'status' => "pending"
            ]
        ]);
    }
}
