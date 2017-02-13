<?php

namespace App\Models;

use App\Models\Service\ServiceProperty;
use Illuminate\Database\Eloquent\Model;

class Contracting extends Model
{
    //
    public $table = "contracting";

    protected $fillable = ['main_category', 'description', 'tenant_id', 'job_type', 'company_id'];

    
    public function jobType()
    {
        return $this->belongsTo(JobTypes::class);
    }

    public function workType()
    {
        return $this->belongsTo(WorkTypes::class);
    }

    public function mainCategory(){
        return $this->belongsTo(ServiceProperty::class, 'main_category');
    }

}
