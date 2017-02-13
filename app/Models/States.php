<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class States extends Model
{
    public $table = "states";

    protected $fillable = ['id', 'name'];
}
