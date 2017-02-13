<?php

namespace App\Models;

use App\Constants\HireTypes;
use Illuminate\Database\Eloquent\Model;

class PlantHire extends Model
{

    public $table = "plant_hire";

    protected $fillable = ['main_category', 'hire_type_id', 'tenant_id', 'description', 'quantity', 'job_type', 'company_id'];

    public function getMainCategoryLabelAttribute(){

        $main_category = $this->main_category;
        $list = HireTypes::HireTypes;

        if(isset($main_category)){
            if(isset($list[$main_category])){
                return $list[$main_category];
            }
        }
        return null;
    }

    public function tenants()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function itemCategory()
    {
        return $this->belongsTo(ItemCategories::class);
    }


    public function hireType()
    {
        return $this->belongsTo(HireType::class);
    }

    public function accessory()
    {
        return $this->belongsTo(Accessories::class);
    }

    public function jobRequest()
    {
        return $this->belongsTo(JobRequests::class);
    }

    public function mainCategory(){
        return $this->belongsTo(PlantHireProperties::class, 'main_category');
    }

}
