<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Model;

class ServicePropertyDynamic extends Model
{
    public $table = "service_property_dynamics";

    protected $fillable = [
        'id',
        'label',
        'type',
        'measure',
        'default_value',
        'required',
        'status',
        'service_property_id'
    ];

    public function options(){
        return $this->hasMany(ServicePropertyOption::class,'s_d_p_id');
    }
}
