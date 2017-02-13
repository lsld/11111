<?php

namespace App\Models\PlantHire;

use Illuminate\Database\Eloquent\Model;
use App\Models\RequestItems\HirerRequestItem;

class PlantHireRequest extends Model
{
    //
    public $table = "plant_hire_requests";

    protected $fillable = [
        'tenants_id',
        'states_id',
        'regions_id',
        'suburb',
        'post_code',
        'street_address',
        'duration',
        'description',
        'exp_date'
    ];

    public function items(){
        return $this->hasMany(HirerRequestItem::class, 'plant_hire_rq_id');
    }
}
