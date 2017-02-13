<?php

namespace App\Models\Fill;

use App\Models\FillType;
use Illuminate\Database\Eloquent\Model;

class FillRequestRestData extends Model
{
    public $table = "fill_request_rest_datas";

    protected $fillable = [
        'request_id',
        'required_date',
        'quantity',
        'number_of_sites',
        'fill_type',
        'can_load_and_carry',
        'distance',
        'fill_quality'
    ];

    public function fillType()
    {
        return $this->belongsTo(FillType::class, 'id');
    }

}
