<?php
/**
 * Created by PhpStorm.
 * User: efutures
 * Date: 12/23/16
 * Time: 11:14 AM
 */

use Illuminate\Database\Seeder;

use App\Models\Service\ServiceProperty;
use App\Models\Service\ServicePropertyDynamic;
use App\Models\Service\ServicePropertyOption;

use App\Constants\Services;

class ServiceSeeds extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        ServiceProperty::truncate();
        ServicePropertyDynamic::truncate();
        ServicePropertyOption::truncate();

        $data = [
            [
                'label' =>  'Survey and layout',
                'properties'    =>  [
                ],
            ],
            [
                'label' =>  'Fencing',
                'properties'    =>  [
                    [
                        'label' =>  'Category',
                        'type'  =>  'DD',
                        'measure'   =>  '',
                        'options'   =>  [
                           'Temporary security fencing',
                            'Agricultural fencing',
                            'Permanent security fencing',
                            'Other'
                        ]
                    ],
                    [
                        'label' =>  'Approxi. length',
                        'type'  =>  'text',
                        'measure'   =>  'm'
                    ],
                ],
            ],
            [
                'label' =>  'pre-construction service relocation',
                'properties'    =>  [
                    [
                        'label' => 'Category',
                        'type'  =>  'DD',
                        'measure'   =>'',
                        'options'   =>  [
                            'Telco',
                            'Electricity',
                            'Gas',
                            'Water',
                            'other'
                        ]
                    ]
                ]
            ],
            [
                'label' =>  'Vegitation removal/mulching',
                'properties'    =>  [
                    [
                        'label' => 'Approxi. volume',
                        'type'  =>  'text',
                        'measure'   =>'m3'
                    ]
                ]
            ],
            [
                'label' =>  'Bulk Earth Works',
                'properties'    =>  [
                    [
                        'label' => 'Category',
                        'type'  =>  'DD',
                        'measure'   =>'',
                        'options'   =>  [
                            'Topsoil removal and stockpile',
                            'Excavation and material removal',
                            'Cut to fill on site'
                        ]
                    ],
					[
                        'label' => 'Material required',
                        'type'  =>  'text',
                        'measure'   =>''
                    ],
					[
                        'label' => 'Approxi. volume',
                        'type'  =>  'text',
                        'measure'   =>'m3'
                    ],
					[
                        'label' => 'Request drawings',
                        'type'  =>  'CB',
                        'measure'   =>''
                    ]
                ]
            ],
			[
                'label' =>  'Rock Excavation and crushing ',
                'properties'    =>  [
                    [
                        'label' => 'Approxi. volume',
                        'type'  =>  'text',
                        'measure'   =>'t'
                    ]
                ]
            ],
			[
                'label' =>  'Road boxing',
                'properties'    =>  [
                    [
                        'label' => 'Approxi. volume',
                        'type'  =>  'text',
                        'measure'   =>''
                    ],
					[
                        'label' => 'Request drawings',
                        'type'  =>  'CB',
                        'measure'   =>''
                    ]
                ]
            ],
			[
                'label' =>  'Pavement construction',
                'properties'    =>  [
                    [
                        'label' => 'Area',
                        'type'  =>  'text',
                        'measure'   =>'m2'
                    ],
					[
                        'label' => 'Request drawings',
                        'type'  =>  'CB',
                        'measure'   =>''
                    ]
                ]
            ],
			[
                'label' =>  'Supply and lay crushed rock',
                'properties'    =>  [
                    [
                        'label' => 'Approxi. Volume ',
                        'type'  =>  'text',
                        'measure'   =>'t'
                    ],
					[
                        'label' => 'Request drawings',
                        'type'  =>  'CB',
                        'measure'   =>''
                    ]
                ]
            ],
			[
                'label' =>  'Storm water drainage',
                'properties'    =>  [
                    [
                        'label' => 'Approxi. volume',
                        'type'  =>  'text',
                        'measure'   =>'m3'
                    ],
					[
                        'label' => 'Diameter',
                        'type'  =>  'text',
                        'measure'   =>'m'
                    ],
					[
                        'label' => 'Length',
                        'type'  =>  'text',
                        'measure'   =>'m'
                    ],
					[
                        'label' => 'Request drawings',
                        'type'  =>  'CB',
                        'measure'   =>''
                    ]
                ]
            ],
			[
                'label' =>  'Road sealing',
                'properties'    =>  [
                    [
                        'label' => 'Category',
                        'type'  =>  'DD',
                        'measure'   =>'',
                        'options'   =>  [
                            'Ashphalt',
                            'Spray seal',
                            'Concrete'
                        ]
                    ],
					[
                        'label' => 'Approxi. volume',
                        'type'  =>  'text',
                        'measure'   =>'m3'
                    ],
					[
                        'label' => 'Request drawings',
                        'type'  =>  'CB',
                        'measure'   =>''
                    ]
                ]
            ],
			[
                'label' =>  'Road Signage',
                'properties'    =>  [
                    [
                        'label' => 'Signage List',
                        'type'  =>  'text',
                        'measure'   =>''
                    ]
                ]
            ],
			[
                'label' =>  'Barriers',
                'properties'    =>  [
                    [
                        'label' => 'Barrier type',
                        'type'  =>  'MS',
                        'measure'   =>'',
						'options'   =>  [
                            'Wire rope',
                            'Steel',
                            'Concrete'
                        ]
                    ],
					[
                        'label' => 'Request drawings',
                        'type'  =>  'CB',
                        
                    ]
                ]
            ],
			[
                'label' =>  'Curb & Channel',
                'properties'    =>  [
                    [
                        'label' => 'Type',
                        'type'  =>  'MS',
                        'measure'   =>'',
						'options'   =>  [
                            'Concrete',
                            'Bluestone',
                            'Other'
                        ]
                    ],
					[
                        'label' => 'Request drawings',
                        'type'  =>  'CB',
                        
                    ]
                ]
            ],
			[
                'label' =>  'Footpaths and other concrete works',
                'properties'    =>  [
                    [
                        'label' => 'Approxi. volume',
                        'type'  =>  'text',
                        'measure'   =>'m3'
                    ],
					[
                        'label' => 'Length ',
                        'type'  =>  'text',
                        'measure'   =>'m'
                    ],
					[
                        'label' => 'Request drawings',
                        'type'  =>  'CB',
                        'measure'   =>''
                    ]
                ]
            ],
			[
                'label' =>  'Linemarking',
                'properties'    =>  [
                    [
                        'label' =>  '',
                        'type'  =>  'text',
                        'measure'   =>  '',
                    ]
                ],
            ],
			[
                'label' =>  'Retaining walls',
                'properties'    =>  [
                    [
                        'label' => 'Type',
                        'type'  =>  'MS',
                        'measure'   =>'',
						'options'   =>  [
                            'Timber infill',
                            'Concrete infill',
                            'Other infill'
                        ]
                    ],
					[
                        'label' => 'Approxi. volume ',
                        'type'  =>  'text',
                        'measure'   =>'m3'
                    ],
					[
                        'label' => 'Area',
                        'type'  =>  'text',
                        'measure'   =>'m2'
                    ],
					[
                        'label' => 'Request drawings',
                        'type'  =>  'CB',
                        'measure'   =>''
                    ]
                ]
            ],
			[
                'label' =>  'Bridge works',
                'properties'    =>  [
                    [
                        'label' => 'Category',
                        'type'  =>  'MS',
                        'measure'   =>'',
						'options'   =>  [
                            'Precast supply and place',
                            'Insitu build',
                            'Erect only'
                        ]
                    ],
					[
                        'label' => 'Request drawings',
                        'type'  =>  'CB',
                        
                    ]
                ]
            ],
			[
                'label' =>  'Recycled water Retic',
                'properties'    =>  [
					[
                        'label' => 'Request drawings',
                        'type'  =>  'CB',
                        
                    ]
                ]
            ],
			[
                'label' =>  'Potable Water Retic',
                'properties'    =>  [
					[
                        'label' => 'Request drawings',
                        'type'  =>  'CB',
                        
                    ]
                ]
            ],
			[
                'label' =>  'General sewer retic',
                'properties'    =>  [
					[
                        'label' => 'Request drawings',
                        'type'  =>  'CB',
                        
                    ]
                ]
            ],
			[
                'label' =>  'Electrical installations',
                'properties'    =>  [
                    [
                        'label' => 'Category',
                        'type'  =>  'MS',
                        'measure'   =>'',
						'options'   =>  [
                            'Conduit & Cables',
                            'Street lighting',
                            'Traffic lights',
							'Traffic messaging',
							'Other'
                        ]
                    ],
					[
                        'label' => 'Request drawings',
                        'type'  =>  'CB',
                        
                    ]
                ]
            ],
			[
                'label' =>  'Brick or rock paving',
                'properties'    =>  [
                    [
                        'label' => 'Category',
                        'type'  =>  'MS',
                        'measure'   =>'',
						'options'   =>  [
                            'Brick paving',
                            'Rock paving',
                            'Faux Rock or brick paving',
                        ]
                    ],
					[
                        'label' => 'Area',
                        'type'  =>  'text',
                        'measure'   =>'m2'
                    ],
					[
                        'label' => 'Request drawings',
                        'type'  =>  'CB',
                        
                    ]
                ]
            ],
			[
                'label' =>  'landscape',
                'properties'    =>  [
					[
                        'label' => 'Request drawings',
                        'type'  =>  'CB',
                        
                    ]
                ]
            ],
			[
                'label' =>  'Pump station',
                'properties'    =>  [
                    [
                        'label' => 'Type',
                        'type'  =>  'DD',
                        'measure'   =>'',
                        'options'   =>  [
                            'Structure only supply',
                            'Construct and commission'
                        ]
                    ],
					[
                        'label' => 'Request drawings',
                        'type'  =>  'CB',
                        'measure'   =>''
                    ]
                ]
            ],
			[
                'label' =>  'Marine works',
                'properties'    =>  [
                    [
                        'label' => 'Type',
                        'type'  =>  'MS',
                        'measure'   =>'',
						'options'   =>  [
                            'Marine structures',
                            'Dredging',
                            'Decking',
							'Concrete works'
                        ]
                    ],
					[
                        'label' => 'Request drawings',
                        'type'  =>  'CB',
                        
                    ]
                ]
            ],
			[
                'label' =>  'Scaffolding',
                'properties'    =>  [
                    [
                        'label' => 'Category',
                        'type'  =>  'DD',
                        'measure'   =>'',
						'options'   =>  [
                            'Supply only',
                            'Supply erect and  pull down'
                        ]
                    ]
                ]
            ],
			[
                'label' =>  'Directional Drilling',
                'properties'    =>  [
                    [
                        'label' => 'Diameter',
                        'type'  =>  'text',
                        'measure'   =>'m'
                    ],
					[
                        'label' => 'Bore length',
                        'type'  =>  'text',
                        'measure'   =>'m'
                    ],
					[
                        'label' => 'Bore depth',
                        'type'  =>  'text',
                        'measure'   =>'m'
                    ],
					[
                        'label' => 'Request drawings',
                        'type'  =>  'CB',
                        'measure'   =>''
                    ]
                ]
            ],
			[
                'label' =>  'Pile Boring',
                'properties'    =>  [
                    [
                        'label' => 'Category',
                        'type'  =>  'DD',
                        'measure'   =>'',
						'options'   =>  [
                            'Screw pile',
                            'Driven piles',
                            'Other'
                        ]
                    ],
					[
                        'label' => 'Request drawings',
                        'type'  =>  'CB',
                        
                    ]
                ]
            ],
			[
                'label' =>  'Shot creting',
                'properties'    =>  [
                    [
                        'label' => 'Area',
                        'type'  =>  'text',
                        'measure'   =>'m2'
                    ],
					[
                        'label' => 'Other details',
                        'type'  =>  'text',
                        'measure'   =>''
                    ]
                ]
            ],
			[
                'label' =>  'Grouting',
                'properties'    =>  [
                    [
                        'label' => 'Area',
                        'type'  =>  'text',
                        'measure'   =>'m2'
                    ],
					[
                        'label' => 'Other details',
                        'type'  =>  'text',
                        'measure'   =>''
                    ]
                ]
            ],
			[
                'label' =>  'Rock bolting',
                'properties'    =>  [
                    [
                        'label' => 'Quantity',
                        'type'  =>  'text',
                        'measure'   =>''
                    ],
					[
                        'label' => 'Size',
                        'type'  =>  'text',
                        'measure'   =>''
                    ],
					[
                        'label' => 'Other details',
                        'type'  =>  'text',
                        'measure'   =>''
                    ]
                ]
            ],
			[
                'label' =>  'Pavement Stabilization',
                'properties'    =>  [
                    [
                        'label' => 'Area',
                        'type'  =>  'text',
                        'measure'   =>''
                    ],
					[
                        'label' => 'Depth',
                        'type'  =>  'text',
                        'measure'   =>''
                    ],
					[
                        'label' => 'Additive',
                        'type'  =>  'text',
                        'measure'   =>''
                    ],
					[
                        'label' => 'other details',
                        'type'  =>  'text',
                        'measure'   =>''
                    ]
                ]
            ],
			[
                'label' =>  'Pavement profiling',
                'properties'    =>  [
                ],
            ]
        ];


        foreach($data as $data_list){
            if($data_list){

                $pro_c = array(
                    'label' =>  $data_list['label'],
                    'status'    =>  Services::ACTIVATED,
                );

                $service = ServiceProperty::create($pro_c);
                /* seed service first level */

                if(isset($data_list['properties'])){
                    if($data_list['properties']){

                        foreach ($data_list['properties'] as $service_data){

                            if($service_data) {
                                if(isset($service_data['label'])){

                                    $measure = '';
                                    if(isset($service_data['measure'])){
                                        $measure = $service_data['measure'];
                                    }

                                    $pro_c2 = array(
                                        'label'     => $service_data['label'],
                                        'type'      => $service_data['type'],
                                        'measure'   =>  $measure,
                                        'default_value' => '',
                                        'status'    => Services::ACTIVATED,
                                        'required'  => '',
                                    );

                                    $DynamicService_id =  $service->properties()->save( new ServicePropertyDynamic($pro_c2))->id;
                                    /* seed second level properties and get property id */

                                    if (isset($service_data['options'])) {
                                        if ($service_data['options']) {
                                            $pro_c3 = array();
                                            foreach ($service_data['options'] as $options) {

                                                if ($options) {

                                                    $pro_c3[] = new ServicePropertyOption(['option' => $options]);

                                                }

                                            }
                                            $ServiceDynamicProperty = ServicePropertyDynamic::find($DynamicService_id);
                                            $ServiceDynamicProperty->options()->saveMany($pro_c3, false);
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