<?php

namespace App\Models\RequestItems;

use App\Models\PlantHire\PlantHireDynamicProperty;
use App\Models\Service\ServicePropertyDynamic;
use Illuminate\Database\Eloquent\Model;
use App\Models\RequestItems\HirerRequestItemMsData;
use App\Models\RequestItems\HirerRequestItemDropdownData;
use App\Models\RequestItems\HirerRequestItemTextData;
use App\Models\RequestItems\HirerRequestItemRbData;
use App\Models\RequestItems\HirerRequestItemCbData;


class HirerRequestItemProperty extends Model
{
    //

    public $table = "hirer_request_item_properties";

    protected $fillable = [
        'request_id',
        'property_id',
        'dynamic_property_id',
        'type',
        'description'
    ];
    
    public function text(){
        return $this->hasOne(HirerRequestItemTextData::class, 'rq_item_id');
    }

    public function dropdown(){
        return $this->hasOne(HirerRequestItemDropdownData::class, 'rq_item_id');
    }

    public function multiSelect(){
        //return $this->belongsTo(HirerRequestItemMsData::class, 'rq_item_id');
        return $this->hasMany(HirerRequestItemMsData::class, 'rq_item_id');
    }

    public function radioButton(){
        return $this->hasOne(HirerRequestItemRbData::class, 'rq_item_id');
    }

    public function checkBox(){
        return $this->hasOne(HirerRequestItemCbData::class, 'rq_item_id');
    }

    public function dynamicProperty()
    {
        return $this->belongsTo(PlantHireDynamicProperty::class, 'dynamic_property_id');
    }

    public function serviceDynamicProperty()
    {
        return $this->belongsTo(ServicePropertyDynamic::class, 'dynamic_property_id');
    }

}
