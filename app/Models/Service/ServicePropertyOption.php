<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Model;

class ServicePropertyOption extends Model
{
    public $table = "service_property_options";

    protected $fillable = [

        'option',
        'status',
        's_d_p_id'
    ];
    
}
