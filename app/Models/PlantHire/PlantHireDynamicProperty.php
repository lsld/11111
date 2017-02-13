<?php

namespace App\Models\PlantHire;

use App\Models\RequestItems\HirerRequestItemProperty;
use Illuminate\Database\Eloquent\Model;
use App\Models\PlantHire\PlantHireDynamicPropertiesOption;

class PlantHireDynamicProperty extends Model
{

    public $table = "plant_hire_dynamic_properties";
    ///public $timestamps = false;

    protected $fillable = ['id','label','type','default_value','status','required','plant_hire_id'];


    public function options(){
        return $this->hasMany(PlantHireDynamicPropertiesOption::class,'ph_dynamic_id');
    }

    public function itemProperty()
    {
        return $this->hasMany(HirerRequestItemProperty::class, 'id');

    }
}
