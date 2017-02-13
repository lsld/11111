<?php
namespace Services\JobRequest;

use App\Models\RequestItems\HirerRequestItem;
use App\Models\RequestItems\HirerRequestItemProperty;
use App\Models\RequestItems\HirerRequestItemTextData;
use App\Models\RequestItems\HirerRequestItemDropdownData;
use App\Models\RequestItems\HirerRequestItemMsData;
use App\Models\RequestItems\HirerRequestItemRbData;
use App\Models\RequestItems\HirerRequestItemCbData;
use App\Models\Service\ServicePropertyDynamic;

use App\Models\PlantHire\PlantHireDynamicProperty;



class JobRequestManageService{

    protected $hirerRequestItem;
    protected $plantHireDynamicProperty;
    protected $servicePropertyDynamic;
    protected $hirerRequestItemTextData;
    protected $hirerRequestItemDropdownData;
    protected $hirerRequestItemMsData;
    protected $hirerRequestItemProperty;
    protected $hirerRequestItemRbData;
    protected $hirerRequestItemCbData;

    public function __construct(HirerRequestItem $hirerRequestItem,
                                PlantHireDynamicProperty $plantHireDynamicProperty,
                                ServicePropertyDynamic $servicePropertyDynamic,
                                HirerRequestItemTextData $hirerRequestItemTextData,
                                HirerRequestItemDropdownData $hirerRequestItemDropdownData,
                                HirerRequestItemMsData $hirerRequestItemMsData,
                                HirerRequestItemProperty $hirerRequestItemProperty,
                                HirerRequestItemRbData $hirerRequestItemRbData,
                                HirerRequestItemCbData $hirerRequestItemCbData)
    {

        $this->hirerRequestItem = $hirerRequestItem;
        $this->plantHireDynamicProperty = $plantHireDynamicProperty;
        $this->servicePropertyDynamic = $servicePropertyDynamic;
        $this->hirerRequestItemTextData = $hirerRequestItemTextData;
        $this->hirerRequestItemDropdownData = $hirerRequestItemDropdownData;
        $this->hirerRequestItemMsData = $hirerRequestItemMsData;
        $this->hirerRequestItemProperty = $hirerRequestItemProperty;
        $this->hirerRequestItemRbData = $hirerRequestItemRbData;
        $this->hirerRequestItemCbData = $hirerRequestItemCbData;

    }

    public function dropData( $id, $plant_hire_data){



        $level_1 = $plant_hire_data['id'];
        foreach ($plant_hire_data['plant_hire'] as $ph_data){
            $level_2 = $ph_data['id'];
            foreach ($ph_data['properties'] as $pd_data){
                $level_3 = $pd_data['id'];

                switch ($pd_data['type']) {
                    case 'text':
                        $this->hirerRequestItemTextData->where('rq_item_id', $level_3)->delete();
                        break;
                    case 'DD':
                        $this->hirerRequestItemDropdownData->where('rq_item_id', $level_3)->delete();
                        break;
                    case 'MS':
                        $this->hirerRequestItemMsData->where('rq_item_id', $level_3)->delete();
                        break;
                    case 'RB':
                        $this->hirerRequestItemRbData->where('rq_item_id', $level_3)->delete();
                        break;
                    case 'CB':
                        $this->hirerRequestItemCbData->where('rq_item_id', $level_3)->delete();
                        break;
                };
            }
            $this->hirerRequestItemProperty->where('request_id', $level_2)->delete();
        }
        $this->hirerRequestItem->where('request_id', $level_1)->delete();
        $this->hirerRequestItem->where('request_id', $id)->delete();

        return true;
    }

    public function addItem($job_type_id, $request_id, $data){

        if($data){
            foreach ($data as $key => $d){

                $rq_id = $this->hirerRequestItem->create([
                    'job_type_id'   =>  $job_type_id,
                    'request_id'    =>  $request_id,
                    'properties_id' =>  $key,
                    'description'   =>  '',
                ]);

                //print_r($d);
                if($d){
                    foreach ($d as $k2 => $dd){

                        $type = null;
                        switch ($job_type_id){
                            case 1:
                                $type = $this->plantHireDynamicProperty->select('type')->find($k2);
                                break;
                            case 2:
                                $type = $this->servicePropertyDynamic->select('type')->find($k2);
                                break;
                        }


                        //dd($type);
                        $tt = [
                            'property_id' => $request_id,
                            'dynamic_property_id' => $k2,
                            'type'  =>  $type->type,
                            'description' => ''
                        ];

                        $idd = $rq_id->properties()->save(new HirerRequestItemProperty($tt))->id;


                        $hrip = $this->hirerRequestItemProperty->find($idd);

                        if($dd || $type->type=="CB"){
                            ///echo $k2.' - '.$type->type.'<br>';
                            switch ($type->type) {
                                case 'text':
                                    $hrip->text()->save(new HirerRequestItemTextData([ 'd_p_id' => $k2, 'value' =>  $dd ]));
                                    break;
                                case 'DD':
                                    $hrip->dropdown()->save(new HirerRequestItemDropdownData([ 'd_p_id' => $k2, 'option_id' =>  $dd ]));
                                    break;
                                case 'MS':
                                    $info = array();
                                    foreach ($dd as $rr){
                                        $info[] = new HirerRequestItemMsData([ 'd_p_id' => $k2, 'option_id' =>  $rr ]);
                                    }
                                    //dd($info);
                                    $hrip->multiSelect()->saveMany($info);
                                    break;
                                case 'RB':
                                    $hrip->radioButton()->save(new HirerRequestItemRbData([ 'd_p_id' => $k2, 'option_id' =>  $dd ]));
                                    break;
                                case 'CB':
                                    $dd_val = 0;
                                    if($dd){
                                        $dd_val = 1;
                                    }
                                    $hrip->checkBox()->save(new HirerRequestItemCbData([ 'd_p_id' => $k2, 'checked' =>  $dd_val ]));
                                    break;
                            }
                        }
                    }
                }
            }
        }

        return true;
    }

}