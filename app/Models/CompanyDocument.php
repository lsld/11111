<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyDocument extends Model
{
    protected $fillable =[ 'name', 'url', 'size','company_id' ];
    public $path = "uploads/docs";
    public $limit = 5;

    public function getUrlAttribute($url)
    {
        return $this->path."/".$url;
    }

    public function getFullUrlAttribute()
    {
        return asset($this->url);
    }

    public function getSizeAttribute($size)
    {
        $calSize = $size/1024;
        $symbol = "KB";
        if ($calSize > 1023) {
            $calSize = $calSize/1024;
            $symbol = "MB";
        }
        return round($calSize,2).$symbol;
    }
}
