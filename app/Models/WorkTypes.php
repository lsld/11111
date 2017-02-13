<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkTypes extends Model
{
    //
    public $table = "work_types";


    protected  $fillable = ['name'];
}
