<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndustryCertification extends Model{

    protected $fillable = [
        'profile_id',
        'num',
        'path'
    ];

    public $table = "industry_certifications";

    public $logoPath = 'uploads/logos/';

    public function getImagePath( $path = null){

        return url($this->logoPath.$path);
    }
}