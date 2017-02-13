<?php

namespace App\Models\PlantHire;

use App\Models\RequestItems\HirerRequestItemDropdownData;
use App\Models\RequestItems\HirerRequestItemMsData;
use App\Models\RequestItems\HirerRequestItemRbData;
use Illuminate\Database\Eloquent\Model;

class PlantHireDynamicPropertiesOption extends Model
{
    public $table = "plant_hire_dynamic_properties_options";
    ///public $timestamps = false;

    protected $fillable = ['id','ph_dynamic_id','option'];

}
