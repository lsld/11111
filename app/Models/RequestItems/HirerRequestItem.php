<?php

namespace App\Models\RequestItems;

use App\Models\PlantHireProperties;
use App\Models\Service\ServiceProperty;
use Illuminate\Database\Eloquent\Model;
use App\Models\RequestItems\HirerRequestItemProperty;
use App\Models\Fill\FillRequestRestData;

class HirerRequestItem extends Model
{
    public $table = "hirer_request_items";

    protected $fillable = [
        'job_type_id',
        'request_id',
        'properties_id',
        'description'
    ];

    public function properties(){
        return $this->hasMany(HirerRequestItemProperty::class, 'request_id');
    }

    public function equipmentType()
    {
        return $this->belongsTo(PlantHireProperties::class, 'properties_id');
    }

    public function workType()
    {
        return $this->belongsTo(ServiceProperty::class, 'properties_id');
    }

    
}
