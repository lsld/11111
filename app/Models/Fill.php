<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fill extends Model
{
    public $table = "fill";

    protected $fillable = ['main_category', 'fill_quality', 'can_load_and_carry', 'tenant_id', 'job_type', 'company_id'];

    public function fillType()
    {
        return $this->belongsTo(FillType::class);
    }

    public function mainCategory(){
        return $this->belongsTo(FillType::class, 'main_category');
    }

}
