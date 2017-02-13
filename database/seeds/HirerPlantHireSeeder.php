<?php

use Illuminate\Database\Seeder;

use App\Models\PlantHire\PlantHireProperty;
use App\Models\PlantHire\PlantHireDynamicProperty;
use App\Models\PlantHire\PlantHireDynamicPropertiesOption;

use App\Constants\PlantHireStatus;

class HirerPlantHireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        PlantHireProperty::truncate();
        PlantHireDynamicProperty::truncate();
        PlantHireDynamicPropertiesOption::truncate();

        $data = array(
            [
                'label'     =>'Skidsteer Loaders',
                'properties'=> [
                    [
                        'label' =>  'Hire Period',
                        'type'  =>  'text',
                        'show_table' => true,
                    ],
                    [
                        'label' =>  'Hire Type',
                        'type'  =>  'DD',
                        'show_table' => true,
                        'options'=> [
                            'Wet Hire','Dry Hire'
                        ]
                    ],
                    [
                        'label' => 'Wheeled',
                        'type'  =>  'DD',
                        'options'   =>  [
                            'rubber','tracked'
                        ]
                    ],
                    [
                        'label' =>  'Size',
                        'type'  =>  'DD',
                        'options'   => [
                            '>1000KG','1000KG-1500KG','>1500kg'
                        ]
                    ],
                    [
                        'label' =>  'Attachments',
                        'type'  =>  'MS',
                        'options'   =>  [
                            '4 in 1 bucket','Levelling bar','Backhoe','Borer','Trencher','planing head','Broomhead','Dozer blade','hydraulic Hammer','Scrub mulcher','Rock Grab','Fork Tynes'
                        ]
                    ]

                ],
            ],
            [
                'label'  =>  'Rollers-Self Propelled',
                'properties'    =>  [
                    [
                        'label' =>  'Hire Period',
                        'type'  =>  'text',
                        'show_table' => true,
                    ],
                    [
                        'label' =>  'Hire Type',
                        'type'  =>  'DD',
                        'show_table' => true,
                        'options'   =>  [
                            'Wet Hire','Dry Hire',
                        ]
                    ],
                    [
                        'label' =>  'Models',
                        'type'  =>  'DD',
                        'options'   =>  [
                            'Smooth Drum','Pad Foot'
                        ]
                    ],
                    [
                        'label' =>  'Drum Weight',
                        'type'  =>  'DD',
                        'options'   =>  [
                            '< 2 t','2t-4t','4t-8t','8t-16t','16t <'
                        ]
                    ]
                ]
            ],
			[
                'label'  =>  'Graders',
                'properties'    =>  [
                    [
                        'label' =>  'Hire Period',
                        'type'  =>  'text',
                        'show_table' => true,
                    ],
                    [
                        'label' =>  'Hire Type',
                        'type'  =>  'DD',
                        'show_table' => true,
                        'options'   =>  [
                            'Wet Hire','Dry Hire',
                        ]
                    ],
                    [
                        'label' =>  'Operating Weight',
                        'type'  =>  'DD',
                        'options'   =>  [
                            '15t-20t','20t-25t','25T <',
                        ]
                    ],
                    [
                        'label' =>  'Blade Width',
                        'type'  =>  'DD',
                        'options'   =>  [
                            '3665mm','4270mm','4880mm'
                        ]
                    ],
					[
                        'label' =>  'Accessories',
                        'type'  =>  'RB',
                        'options'   =>  [
                            'GPS Capability','Laser'
                        ]
                    ]
                ]
            ],
			[
                'label'  =>  'Rollers Multityres',
                'properties'    =>  [
                    [
                        'label' =>  'Hire Period',
                        'type'  =>  'text',
                        'show_table' => true,
                    ],
                    [
                        'label' =>  'Hire Type',
                        'type'  =>  'DD',
                        'show_table' => true,
                        'options'   =>  [
                            'Wet Hire','Dry Hire',
                        ]
                    ],
                    [
                        'label' =>  'Operating Weight',
                        'type'  =>  'DD',
                        'options'   =>  [
                            '6t-10t','10t-17t',
                        ]
                    ],
                    [
                        'label' =>  'Ballasted Weight',
                        'type'  =>  'DD',
                        'options'   =>  [
                            '14t-27t','27t-30t'
                        ]
                    ]
                ]
            ],
			[
                'label'  =>  'Wheeled Loaders',
                'properties'    =>  [
                    [
                        'label' =>  'Hire Period',
                        'type'  =>  'text',
                        'show_table' => true,
                    ],
                    [
                        'label' =>  'Hire Type',
                        'type'  =>  'DD',
                        'show_table' => true,
                        'options'   =>  [
                            'Wet Hire','Dry Hire',
                        ]
                    ],
                    [
                        'label' =>  'Models',
                        'type'  =>  'DD',
                        'options'   =>  [
                            'Wheel Loader','Intergrated Tool Carrier'
                        ]
                    ],
                    [
                        'label' =>  'Bucket Capacity',
                        'type'  =>  'DD',
                        'options'   =>  [
                            '> 1.0 m3','1-2 m3','2-3 m3','3-5 m3','<5 m3'
                        ]
                    ],
					[
                        'label' =>  'Attachments',
                        'type'  =>  'MS',
                        'options'   =>  [
                            'toothed bucket','Straight edge bucket','Log Grab'
                        ]
                    ]
                ]
            ],
			[
                'label'  =>  'Tracked Loader',
                'properties'    =>  [
                    [
                        'label' =>  'Hire Period',
                        'type'  =>  'text',
                        'show_table' => true,
                    ],
                    [
                        'label' =>  'Hire Type',
                        'type'  =>  'DD',
                        'show_table' => true,
                        'options'   =>  [
                            'Wet Hire','Dry Hire',
                        ]
                    ],
                    [
                        'label' =>  'Capacity',
                        'type'  =>  'DD',
                        'options'   =>  [
                            '< 16t','> 16t'
                        ]
                    ],
                    [
                        'label' =>  'Attachments',
                        'type'  =>  'MS',
                        'options'   =>  [
                            '4 in 1','toothed GP','Log Grab'
                        ]
                    ]
                ]
            ],
			[
                'label'  =>  'Fill Compactors',
                'properties'    =>  [
                    [
                        'label' =>  'Hire Period',
                        'type'  =>  'text',
                        'show_table' => true,
                    ],
                    [
                        'label' =>  'Hire Type',
                        'type'  =>  'DD',
                        'show_table' => true,
                        'options'   =>  [
                            'Wet Hire','Dry Hire',
                        ]
                    ],
                    [
                        'label' =>  'Operating Weight',
                        'type'  =>  'DD',
                        'options'   =>  [
                            '20t-25t','<25t'
                        ]
                    ],
                    [
                        'label' =>  'Attachments',
                        'type'  =>  'MS',
                        'options'   =>  [
                            'Straight Blade','U Blade','GPS/Laser machine guidance'
                        ]
                    ]
                ]
            ],
			[
                'label'  =>  'Excavators',
                'properties'    =>  [
                    [
                        'label' =>  'Hire Period',
                        'type'  =>  'text',
                        'show_table' => true,
                    ],
                    [
                        'label' =>  'Hire Type',
                        'type'  =>  'DD',
                        'show_table' => true,
                        'options'   =>  [
                            'Wet Hire','Dry Hire',
                        ]
                    ],
                    [
                        'label' =>  'Configuration',
                        'type'  =>  'DD',
                        'options'   =>  [
                            'Standard','Zero Swing','Long Reach','Off set'
                        ]
                    ],
                    [
                        'label' =>  'Size/Weight',
                        'type'  =>  'DD',
                        'options'   =>  [
                            '> 3t','5-10t','10-15t','15-20t','20-25t','25-30t','30-40t','40-50t','<50t'
                        ]
                    ],
					[
                        'label' =>  'Attachments',
                        'type'  =>  'MS',
                        'options'   =>  [
                            'Mud Bucket','Hammer/Rock Breaker','Auger','Tilt Bucket','Sieve Bucket','Ripper Tyne',
							'Compaction Wheel','AStatic','Vibeplate','Thumb Grab', 'Demolition Sheer', 'Flip Screen'
                        ]
                    ]
                ]
            ],
			[
                'label'  =>  'Bull Dozers',
                'properties'    =>  [
                    [
                        'label' =>  'Hire Period',
                        'type'  =>  'text',
                        'show_table' => true,
                    ],
                    [
                        'label' =>  'Hire Type',
                        'type'  =>  'DD',
                        'show_table' => true,
                        'options'   =>  [
                            'Wet Hire','Dry Hire',
                        ]
                    ],
                    [
                        'label' =>  'Weight',
                        'type'  =>  'DD',
                        'options'   =>  [
                            '5t-10t','10t-15t','15t-20t','20t-25t','25t-30t','30t-40t','>40t'
                        ]
                    ],
                    [
                        'label' =>  'Configuration',
                        'type'  =>  'DD',
                        'options'   =>  [
                            'Standard','Low ground pressure'
                        ]
                    ],
					[
                        'label' =>  'Blade type',
                        'type'  =>  'DD',
                        'options'   =>  [
                            'Straight','Semi U','PAT'
                        ]
                    ],
					[
                        'label' =>  'Attachments',
                        'type'  =>  'MS',
                        'options'   =>  [
                            'GPS','Lazer','Rippers'
                        ]
                    ]
                ]
            ],
			[
                'label'  =>  'Site Dumper',
                'properties'    =>  [
                    [
                        'label' =>  'Hire Period',
                        'type'  =>  'text',
                        'show_table' => true,
                    ],
                    [
                        'label' =>  'Hire Type',
                        'type'  =>  'DD',
                        'show_table' => true,
                        'options'   =>  [
                            'Wet Hire','Dry Hire',
                        ]
                    ],
                    [
                        'label' =>  'Capacity',
                        'type'  =>  'text'
                    ]
                ]
            ],
			[
                'label'  =>  'Safety Equipment & Accessories',
                'properties'    =>  [
                    [
                        'label' =>  'Hire Period',
                        'type'  =>  'text',
                        'show_table' => true,
                    ],
                    [
                        'label' =>  'Hire Type',
                        'type'  =>  'DD',
                        'show_table' => true,
                        'options'   =>  [
                            'Wet Hire','Dry Hire',
                        ]
                    ]
                ]
            ],
			[
                'label'  =>  'Lighting Equipment',
                'properties'    =>  [
                    [
                        'label' =>  'Hire Period',
                        'type'  =>  'text',
                        'show_table' => true,
                    ],
                    [
                        'label' =>  'Hire Type',
                        'type'  =>  'DD',
                        'show_table' => true,
                        'options'   =>  [
                            'Wet Hire','Dry Hire',
                        ]
                    ]
                ]
            ],
			[
                'label'  =>  'Tipper Truck',
                'properties'    =>  [
                    [
                        'label' =>  'Hire Period',
                        'type'  =>  'text',
                        'show_table' => true,
                    ],
                    [
                        'label' =>  'Hire Type',
                        'type'  =>  'DD',
                        'show_table' => true,
                        'options'   =>  [
                            'Wet Hire','Dry Hire',
                        ]
                    ],
                    [
                        'label' =>  'Capacity',
                        'type'  =>  'DD',
                        'options'   =>  [
                            '0-3 m3','3-5 m3','> 5 m3'
                        ]
                    ]
                ]
            ],
			[
                'label'  =>  'Wheeled Excavator',
                'properties'    =>  [
                    [
                        'label' =>  'Hire Period',
                        'type'  =>  'text',
                        'show_table' => true,
                    ],
                    [
                        'label' =>  'Hire Type',
                        'type'  =>  'DD',
                        'show_table' => true,
                        'options'   =>  [
                            'Wet Hire','Dry Hire',
                        ]
                    ],
                    [
                        'label' =>  'Configuration',
                        'type'  =>  'DD',
                        'options'   =>  [
                            'Standard','Zero Swing'
                        ]
                    ],
                    [
                        'label' =>  'Weight',
                        'type'  =>  'DD',
                        'options'   =>  [
                            '< 3t','5-10t','10-15t','15-20t','20-25t','25-30t'
                        ]
                    ],
					[
                        'label' =>  'Attachments',
                        'type'  =>  'MS',
                        'options'   =>  [
                            'Mud Bucket','Hammer/Rock Breaker','Auger','Tilt Bucket','Sieve Bucket','Ripper Tyne','Vibeplate',
							'Thumb Grab','Demolition Sheer','Flip Screen'
                        ]
                    ]
                ]
            ],
			[
                'label'  =>  'Motor Scrappers',
                'properties'    =>  [
                    [
                        'label' =>  'Hire Period',
                        'type'  =>  'text',
                        'show_table' => true,
                    ],
                    [
                        'label' =>  'Hire Type',
                        'type'  =>  'DD',
                        'show_table' => true,
                        'options'   =>  [
                            'Wet Hire','Dry Hire',
                        ]
                    ],
                    [
                        'label' =>  'Models',
                        'type'  =>  'DD',
                        'options'   =>  [
                            'Single Power Self Loading','Singe Power Open Bowl'
                        ]
                    ],
                    [
                        'label' =>  'Capacity',
                        'type'  =>  'DD',
                        'options'   =>  [
                            '<12 m3','12-16 m3','16-23 m3', '>23 m3'
                        ]
                    ],
					[
                        'label' =>  'Attachments',
                        'type'  =>  'MS',
                        'options'   =>  [
                            'Twin Power','Twin Power Self Loading','GPS','Laser Capability'
                        ]
                    ]
                ]
            ],
			[
                'label'  =>  'Water Truck',
                'properties'    =>  [
                    [
                        'label' =>  'Hire Period',
                        'type'  =>  'text',
                        'show_table' => true,
                    ],
                    [
                        'label' =>  'Hire Type',
                        'type'  =>  'DD',
                        'show_table' => true,
                        'options'   =>  [
                            'Wet Hire','Dry Hire',
                        ]
                    ],
                    [
                        'label' =>  'Models',
                        'type'  =>  'DD',
                        'options'   =>  [
                            'On Road','Off Road'
                        ]
                    ],
                    [
                        'label' =>  'Capacity',
                        'type'  =>  'DD',
                        'options'   =>  [
                            '<10,000 l','10-16,000 l','16,000-25,000 l', '>25,000 l'
                        ]
                    ]
                ]
            ],
			[
                'label'  =>  'Access Equipment',
                'properties'    =>  [
                    [
                        'label' =>  'Hire Period',
                        'type'  =>  'text',
                        'show_table' => true,
                    ],
                    [
                        'label' =>  'Hire Type',
                        'type'  =>  'DD',
                        'show_table' => true,
                        'options'   =>  [
                            'Wet Hire','Dry Hire',
                        ]
                    ],
                    [
                        'label' =>  'Models',
                        'type'  =>  'DD',
                        'options'   =>  [
                            'Scissor Lift Diesel','Scissor -Eletric','Knuckle Boom-EWP','Straight Boom-EWP','Truck Mounted-EWP','Track Scissor Lift'
                        ]
                    ]
                ]
            ],
			[
                'label'  =>  'Weilders & Compressors',
                'properties'    =>  [
                    [
                        'label' =>  'Hire Period',
                        'type'  =>  'text',
                        'show_table' => true,
                    ],
                    [
                        'label' =>  'Hire Type',
                        'type'  =>  'DD',
                        'show_table' => true,
                        'options'   =>  [
                            'Wet Hire','Dry Hire',
                        ]
                    ]
                ]
            ],
			[
                'label'  =>  'BackHoe',
                'properties'    =>  [
                    [
                        'label' =>  'Hire Period',
                        'type'  =>  'text',
                        'show_table' => true,
                    ],
                    [
                        'label' =>  'Hire Type',
                        'type'  =>  'DD',
                        'show_table' => true,
                        'options'   =>  [
                            'Wet Hire','Dry Hire',
                        ]
                    ],
                    [
                        'label' =>  'Models',
                        'type'  =>  'DD',
                        'options'   =>  [
                            '2WD','4WD'
                        ]
                    ],
                    [
                        'label' =>  'Attachments',
                        'type'  =>  'MS',
                        'options'   =>  [
                            '4 in 1 bucket','Extended hoe'
                        ]
                    ]
                ]
            ],
			[
                'label'  =>  'Concrete Pumping',
                'properties'    =>  [
                    [
                        'label' =>  'Hire Period',
                        'type'  =>  'text',
                        'show_table' => true,
                    ],
                    [
                        'label' =>  'Hire Type',
                        'type'  =>  'DD',
                        'show_table' => true,
                        'options'   =>  [
                            'Wet Hire','Dry Hire',
                        ]
                    ],
                    [
                        'label' =>  'Models',
                        'type'  =>  'DD',
                        'options'   =>  [
                            'Boom Pump','Line Pump','Shortcreting','Static Skid Pumps','Placing Pumps'
                        ]
                    ],
                    [
                        'label' =>  'Capacity',
                        'type'  =>  'DD',
                        'options'   =>  [
                            '<20m','20-30m','30-50m','>50m'
                        ]
                    ]
                ]
            ],
			[
                'label'  =>  'Containers',
                'properties'    =>  [
                    [
                        'label' =>  'Hire Period',
                        'type'  =>  'text',
                        'show_table' => true,
                    ],
                    [
                        'label' =>  'Hire Type',
                        'type'  =>  'DD',
                        'show_table' => true,
                        'options'   =>  [
                            'Wet Hire','Dry Hire',
                        ]
                    ],
                    [
                        'label' =>  'Configuration',
                        'type'  =>  'DD',
                        'options'   =>  [
                            'Standard Containers','Dangerous goods containers'
                        ]
                    ],
                    [
                        'label' =>  'Length',
                        'type'  =>  'DD',
                        'options'   =>  [
                            '10ft','20ft','40ft'
                        ]
                    ]
                ]
            ],
			[
                'label'  =>  'Cranes',
                'properties'    =>  [
                    [
                        'label' =>  'Hire Period',
                        'type'  =>  'text',
                        'show_table' => true,
                    ],
                    [
                        'label' =>  'Hire Type',
                        'type'  =>  'DD',
                        'show_table' => true,
                        'options'   =>  [
                            'Wet Hire','Dry Hire',
                        ]
                    ],
                    [
                        'label' =>  'Models',
                        'type'  =>  'DD',
                        'options'   =>  [
                            'Crawler','Non Slew Mobile','Mobile Slew','Tower Cranes','Mobile Crawler'
                        ]
                    ],
                    [
                        'label' =>  'Capacity',
                        'type'  =>  'DD',
                        'options'   =>  [
                            '<10T SWL','12-2OT SWL','20-50T SWL','50-100T SWL','100-200T SWL','>200T SWL'
                        ]
                    ]
                ]
            ],
        );



        foreach($data as $data_list){
            if($data_list){

                $pro_c = array(
                    'label' =>  $data_list['label'],
                    'status'    =>  PlantHireStatus::ACTIVATED,
                );

                $properties = PlantHireProperty::create($pro_c);
                /* seed plant hire first level */

                if(isset($data_list['properties'])){
                    if($data_list['properties']){

                        foreach ($data_list['properties'] as $properties_data){

                            if($properties_data) {
                                if(isset($properties_data['label'])){

                                    $show_table = 0;
                                    if(isset($properties_data['show_table'])){
                                        if($properties_data['show_table']){
                                            $show_table = 1;
                                        }
                                    }

                                    $pro_c2 = array(
                                        'label'     => $properties_data['label'],
                                        'type'      => $properties_data['type'],
                                        'default_value' => '',
                                        'status'    => PlantHireStatus::ACTIVATED,
                                        'required'  => '',
                                        'show_table' => $show_table,
                                    );

                                    $DynamicProperty_id =  $properties->properties()->save( new PlantHireDynamicProperty($pro_c2))->id;
                                    /* seed second level properties and get property id */

                                    if (isset($properties_data['options'])) {
                                        if ($properties_data['options']) {
                                            $pro_c3 = array();
                                            foreach ($properties_data['options'] as $options) {

                                                if ($options) {

                                                    $pro_c3[] = new PlantHireDynamicPropertiesOption(['option' => $options]);

                                                }

                                            }
                                            $PlantHireDynamicProperty = PlantHireDynamicProperty::find($DynamicProperty_id);
                                            $PlantHireDynamicProperty->options()->saveMany($pro_c3, false);
                                            /* Seed options third level  */
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }

        }

    }
}
