<?php

namespace App\Models;

use App\Models\RequestItems\HirerRequestItem;
use Illuminate\Database\Eloquent\Model;

class PlantHireProperties extends Model
{
    public $table = "plant_hire_properties";

    protected $fillable = ['id', 'label', 'status'];

    public function requestItem()
    {
        return $this->hasMany(HirerRequestItem::class, 'id');
    }
    
}
