<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResourceType extends Model
{
    //
    public $table = "resource_types";

    protected $fillable = ['name'];

}
