<?php

namespace App\Models\PlantHire;

use Illuminate\Database\Eloquent\Model;
use App\Models\PlantHire\PlantHireDynamicProperty;


class PlantHireProperty extends Model
{
    //
    public $table = "plant_hire_properties";

    protected $fillable = ['label','status'];

    public function properties(){
        return $this->hasMany(PlantHireDynamicProperty::class, 'plant_hire_id');
    }
    
}
