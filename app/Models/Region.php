<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public $table = "regions";

    protected $fillable = ['id', 'name'];

    public function state()
    {
        return $this->belongsTo(States::class);
    }
    
    
}
