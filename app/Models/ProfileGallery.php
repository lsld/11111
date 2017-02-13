<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileGallery extends Model
{
    protected $fillable =[ 'name', 'url', 'profile_id' ];
    public $path = "uploads/profile";
    public $limit = 20;

    public function getUrlAttribute($url)
    {
        return "/".$this->path."/".$url;
    }
}
