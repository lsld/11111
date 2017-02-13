<?php

use App\Models\JobRequests;

use Illuminate\Database\Seeder;

class JobRequestsSeeder extends Seeder
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
                'code' => 'R-001',


                'entity_id'  => '11',


                'entity_type'  => 'entity type1',


                'duration'  => '7 days',


                'description'  => 'description for job requests',


                'expiry_date'  => '2016-12-24 10:02:59' ,


                'job_type_id'  => '1',


                'required_date'  => '2016-12-22 10:02:59',


                'status'  => 'pending'

            ],

            [
                'code' => 'R-002',


                'entity_id'  => '12',


                'entity_type'  => 'entity type2',


                'duration'  => '8 days',


                'description'  => 'description for job requests',


                'expiry_date'  => '2016-12-23 10:02:59' ,


                'job_type_id'  => '2',


                'required_date'  => '2016-12-21 10:02:59',


                'status'  => 'pending'

            ],

            [
                'code' => 'R-003',


                'entity_id'  => '13',


                'entity_type'  => 'entity type2',


                'duration'  => '9 days',


                'description'  => 'description for job requests',


                'expiry_date'  => '2016-12-21 10:02:59' ,


                'job_type_id'  => '3',


                'required_date'  => '2016-12-18 10:02:59',


                'status'  => 'pending'

            ]

        ]);
    }
}
