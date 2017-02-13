<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public static function bySlug($slug)
    {
        return self::where('slug',$slug)->first();
    }
}
