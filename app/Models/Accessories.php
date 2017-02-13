<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accessories extends Model
{
    public $table = "accessories";

    protected $fillable = ['id', 'name'];

    
}
