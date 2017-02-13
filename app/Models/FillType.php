<?php

namespace App\Models;

use App\Models\Fill\FillRequestRestData;
use Illuminate\Database\Eloquent\Model;

class FillType extends Model
{
    //
    public $table = "fill_types";


    protected $fillable = ['name'];

    public function fillRequest()
    {
        return $this->hasMany(FillRequestRestData::class, 'fill_type');
    }
}
