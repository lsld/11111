<?php

namespace App\Models;

use App\Models\Material\MaterialRequestRestData;
use Illuminate\Database\Eloquent\Model;

class MaterialType extends Model
{
    //
    public $table = "material_types";


    protected $fillable = ['name'];

    public function materialRequest()
    {
        return $this->hasMany(MaterialRequestRestData::class, 'resource_type');
    }
}
