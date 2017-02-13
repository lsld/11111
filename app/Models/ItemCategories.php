<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemCategories extends Model
{
    //

    public $table = "item_categories";


    protected $fillable = ['id', 'type', 'name'];
}
