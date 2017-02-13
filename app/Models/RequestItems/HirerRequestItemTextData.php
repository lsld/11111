<?php

namespace App\Models\RequestItems;

use Illuminate\Database\Eloquent\Model;

class HirerRequestItemTextData extends Model
{
    
    public $table = "hirer_request_item_text_datas";

    protected $fillable = [
        'rq_item_id',
        'd_p_id',
        'value',
    ];
}
