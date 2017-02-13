<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobTypes extends Model
{
    public $table = "job_types";
    protected $hidden = ['created_at', 'updated_at'];


    public function plantHire()
    {
        return $this->hasMany(PlantHire::class);
    }
}