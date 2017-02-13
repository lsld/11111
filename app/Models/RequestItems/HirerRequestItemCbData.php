<?php

namespace App\Models\RequestItems;

use App\Models\PlantHire\PlantHireDynamicPropertiesOption;
use Illuminate\Database\Eloquent\Model;

class HirerRequestItemCbData extends Model
{
    //
    public $table = "hirer_request_item_cb_datas";

    protected $fillable = [
        'rq_item_id',
        'd_p_id',
        'checked',
    ];

//    public function option()
//    {
//        return $this->hasMany(PlantHireDynamicPropertiesOption::class, 'id');
//    }
}
