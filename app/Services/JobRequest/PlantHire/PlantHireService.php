<?php

namespace Services\JobRequest\PlantHire;


use App\Models\PlantHire\PlantHireProperty;

class PlantHireService{

    protected $plantHireProperty;
    protected $plantHireRequest;
    
    public function __construct(PlantHireProperty $plantHireProperty){

        $this->plantHireProperty = $plantHireProperty;
        
    }

    public function generateItemTable( $data){

        $info = array();
        if ($data) {
            $r=0;
            foreach ($data as $key => $d) {
                if($d){
                    $dy_data = $this->getDynamicProperties($key);

                    $info['label'][0] = 'Item Type';
                    $info[$key][0]  =  $dy_data['label'];

                    foreach ($dy_data['properties'] as $d_key=> $dd){
                        if($dd['show_table']){

                            if($dd['type']=='text'){
                                $value = $data[$key][$dd['id']];
                            }elseif($dd['type']=='DD'){
                                foreach ($dd['options'] as $opt){
                                    if($opt['id']==$data[$key][$dd['id']]){
                                        $value = $opt['option'];
                                    }
                                }
                            }
                            if($r==0){
                                $info['label'][] = $dd['label'];
                            }
                            $info[$key][]= $value;
                        }
                    }
                    $r++;
                }
            }
        }

        return $info;
    }
    

    public function getPropertyList(){

        return $this->plantHireProperty->all();

    }

    public function getDynamicProperties($id){/* get dynamic property with options */

        return $this->plantHireProperty->with(['properties' => function ($q) {
                            return $q->with('options');
                    }])->find($id)->toArray();
    }

}

