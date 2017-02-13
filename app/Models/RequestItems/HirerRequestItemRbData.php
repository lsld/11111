<?php

namespace App\Models\RequestItems;

use App\Models\PlantHire\PlantHireDynamicPropertiesOption;
use Illuminate\Database\Eloquent\Model;

class HirerRequestItemRbData extends Model
{
    //
    public $table = "hirer_request_item_rb_datas";

    protected $fillable = [
        'rq_item_id',
        'd_p_id',
        'option_id',
    ];

    public function option()
    {
        return $this->belongsTo(PlantHireDynamicPropertiesOption::class, 'option_id');
    }
}
