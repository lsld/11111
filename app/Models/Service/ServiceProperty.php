<?php

namespace App\Models\Service;

use App\Models\RequestItems\HirerRequestItem;
use Illuminate\Database\Eloquent\Model;

class ServiceProperty extends Model
{

    public $table = "service_properties";

    protected $fillable = [
        
            'label',
            'status'
        ];

    public function properties(){
        return $this->hasMany(ServicePropertyDynamic::class, 'service_property_id');
    }

    public function requestItem()
    {
        return $this->hasMany(HirerRequestItem::class, 'id');
    }

}
