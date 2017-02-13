<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    //

    public $table = "material";

    protected $fillable = ['main_category', 'quality', 'tenant_id', 'job_type', 'company_id'];


    public function resourceType()
    {
        return $this->belongsTo(ResourceType::class);
    }

    public function mainCategory(){
        return $this->belongsTo(MaterialType::class, 'main_category');
    }

}
