<?php

namespace App\Models\Material;

use App\Models\MaterialType;
use Illuminate\Database\Eloquent\Model;

class MaterialRequestRestData extends Model
{
    public $table = "material_request_rest_datas";

    protected $fillable = [
        'request_id',
        'resource_type',
        'condition',
        'quantity'

    ];

    public function materialType()
    {
        return $this->belongsTo(MaterialType::class, 'resource_type');
    }

}
