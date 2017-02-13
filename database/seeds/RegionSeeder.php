<?php

use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Region::truncate();
        Region::insert([

                ['name' => 'Blue Mountains' ,'short_code' => 'R4', 'states_id' => '1'],
                ['name' => 'Central Coast' ,'short_code' => 'R4', 'states_id' => '1'],
                ['name' => 'Central Tablelands' ,'short_code' => 'R4', 'states_id' => '1'],
                ['name' => 'Central West' ,'short_code' => 'R4', 'states_id' => '1'],
                ['name' => 'Greater Western Sydney' ,'short_code' => 'R5', 'states_id' => '1'],
                ['name' => 'Far South Coast' ,'short_code' => 'R6', 'states_id' => '1'],
                ['name' => 'Far West' ,'short_code' => 'R7', 'states_id' => '1'],
                ['name' => 'Hunter Region (Newcastle)' ,'short_code' => 'R8', 'states_id' => '1'],
                ['name' => 'Illawarra (Wollongong)' ,'short_code' => 'R9', 'states_id' => '1'],
                ['name' => 'Lord Howe Island' ,'short_code' => 'R10', 'states_id' => '1'],
                ['name' => 'New England (north-west)' ,'short_code' => 'R11', 'states_id' => '1'],
                ['name' => 'Murray' ,'short_code' => 'R12', 'states_id' => '1'],
                ['name' => 'Mid North Coast' ,'short_code' => 'R13', 'states_id' => '1'],
                ['name' => 'North West Slopes' ,'short_code' => 'R14', 'states_id' => '1'],
                ['name' => 'Arnhem Land' ,'short_code' => 'R16', 'states_id' => '7'],
                ['name' => 'Barkly Tableland' ,'short_code' => 'R17', 'states_id' => '7'],
                ['name' => 'Central Australia' ,'short_code' => 'R18', 'states_id' => '7'],
                ['name' => 'Darwin Region' ,'short_code' => 'R19', 'states_id' => '7'],
                ['name' => 'Katherine Region' ,'short_code' => 'R20', 'states_id' => '7'],
                ['name' => 'Top End' ,'short_code' => 'R21', 'states_id' => '7'],
                ['name' => 'Victoria River' ,'short_code' => 'R22', 'states_id' => '7'],
                ['name' => 'Adelaide Plains' ,'short_code' => 'R23', 'states_id' => '3'],
                ['name' => 'Adelaide Hills/Mount Lofty Ranges' ,'short_code' => 'R24', 'states_id' => '3'],
                ['name' => 'Barossa Valley' ,'short_code' => 'R25', 'states_id' => '3'],
                ['name' => 'Eyre Peninsula' ,'short_code' => 'R26', 'states_id' => '3'],
                ['name' => 'Far North' ,'short_code' => 'R27', 'states_id' => '3'],
                ['name' => 'Fleurieu Peninsula' ,'short_code' => 'R28', 'states_id' => '3'],
                ['name' => 'Flinders Ranges' ,'short_code' => 'R29', 'states_id' => '3'],
                ['name' => 'Kangaroo Island' ,'short_code' => 'R30', 'states_id' => '3'],
                ['name' => 'Limestone Coast' ,'short_code' => 'R31', 'states_id' => '3'],
                ['name' => 'Mid North' ,'short_code' => 'R32', 'states_id' => '3'],
                ['name' => 'Murray Mallee' ,'short_code' => 'R33', 'states_id' => '3'],
                ['name' => 'Yorke Peninsula' ,'short_code' => 'R34', 'states_id' => '3'],
                ['name' => 'Central Highlands' ,'short_code' => 'R34', 'states_id' => '4'],
                ['name' => 'Midlands' ,'short_code' => 'R35', 'states_id' => '4'],
                ['name' => 'West Coast' ,'short_code' => 'R36', 'states_id' => '4'],
                ['name' => 'Gippsland' ,'short_code' => 'R39', 'states_id' => '5'],
                ['name' => 'Grampians' ,'short_code' => 'R40', 'states_id' => '5'],
                ['name' => 'North West Slopes' ,'short_code' => 'R1', 'states_id' => '1'],
                ['name' => 'Northern Rivers' ,'short_code' => 'R1', 'states_id' => '1'],
                ['name' => 'Northern Tablelands' ,'short_code' => 'R1', 'states_id' => '1'],
                ['name' => 'Orana' ,'short_code' => 'R1', 'states_id' => '1'],
                ['name' => 'Riverina' ,'short_code' => 'R1', 'states_id' => '1'],
                ['name' => 'Sapphire Coast' ,'short_code' => 'R1', 'states_id' => '1'],
                ['name' => 'Snowy Mountains' ,'short_code' => 'R1', 'states_id' => '1'],
                ['name' => 'South Coast' ,'short_code' => 'R1', 'states_id' => '1'],
                ['name' => 'Southern Highlands' ,'short_code' => 'R1', 'states_id' => '1'],
                ['name' => 'Southern Tablelands' ,'short_code' => 'R1', 'states_id' => '1'],
                ['name' => 'South West Slopes' ,'short_code' => 'R1', 'states_id' => '1'],
                ['name' => 'Sunraysia' ,'short_code' => 'R1', 'states_id' => '1'],
                ['name' => 'Sydney' ,'short_code' => 'R1', 'states_id' => '1'],
                ['name' => 'Clare Valley' ,'short_code' => 'R3', 'states_id' => '3'],
                ['name' => 'Murraylands' ,'short_code' => 'R3', 'states_id' => '3'],
                ['name' => 'Riverland' ,'short_code' => 'R3', 'states_id' => '3'],
                ['name' => 'North West' ,'short_code' => 'R4', 'states_id' => '4'],
                ['name' => 'South West' ,'short_code' => 'R4', 'states_id' => '4'],
                ['name' => 'South East' ,'short_code' => 'R4', 'states_id' => '4'],
                ['name' => 'North East' ,'short_code' => 'R4', 'states_id' => '4'],
                ['name' => 'Melbourne' ,'short_code' => 'R5', 'states_id' => '5'],
                ['name' => 'Yarra Valley & Dandenong Ranges' ,'short_code' => 'R5', 'states_id' => '5'],
                ['name' => 'Daylesford & the Macedon Ranges' ,'short_code' => 'R5', 'states_id' => '5'],
                ['name' => 'Mornington Peninsula' ,'short_code' => 'R5', 'states_id' => '5'],
                ['name' => 'Phillip Island' ,'short_code' => 'R5', 'states_id' => '5'],
                ['name' => 'Geelong & the Bellarine' ,'short_code' => 'R5', 'states_id' => '5'],
                ['name' => 'Great Ocean Road' ,'short_code' => 'R5', 'states_id' => '5'],
                ['name' => 'Goldfields' ,'short_code' => 'R5', 'states_id' => '5'],
                ['name' => 'High Country' ,'short_code' => 'R5', 'states_id' => '5'],
                ['name' => 'The Murray' ,'short_code' => 'R5', 'states_id' => '5'],
                ['name' => 'Gascoyne' ,'short_code' => 'R6', 'states_id' => '6'],
                ['name' => 'Goldfields-Esperance' ,'short_code' => 'R6', 'states_id' => '6'],
                ['name' => 'Great Southern' ,'short_code' => 'R6', 'states_id' => '6'],
                ['name' => 'Kimberley' ,'short_code' => 'R6', 'states_id' => '6'],
                ['name' => 'Mid West' ,'short_code' => 'R6', 'states_id' => '6'],
                ['name' => 'Peel' ,'short_code' => 'R6', 'states_id' => '6'],
                ['name' => 'Pilbara' ,'short_code' => 'R6', 'states_id' => '6'],
                ['name' => 'South West' ,'short_code' => 'R6', 'states_id' => '6'],
                ['name' => 'Wheatbelt' ,'short_code' => 'R6', 'states_id' => '6'],
                ['name' => 'Far North Queensland' ,'short_code' => 'R2', 'states_id' => '2'],
                ['name' => 'North Queensland' ,'short_code' => 'R2', 'states_id' => '2'],
                ['name' => '"Mackay, Isaac, Whitsundays"' ,'short_code' => 'R2', 'states_id' => '2'],
                ['name' => 'Central Queensland' ,'short_code' => 'R2', 'states_id' => '2'],
                ['name' => 'Central West Queensland' ,'short_code' => 'R2', 'states_id' => '2'],
                ['name' => 'Wide Bay Burnett' ,'short_code' => 'R2', 'states_id' => '2'],
                ['name' => 'Darling Downs and South West' ,'short_code' => 'R2', 'states_id' => '2'],
                ['name' => 'Sunshine Coast' ,'short_code' => 'R2', 'states_id' => '2'],
                ['name' => 'Gold Coast' ,'short_code' => 'R2', 'states_id' => '2'],
                
            ]
        );
    }
}

