<?php
/**
 * Created by PhpStorm.
 * User: lasath
 * Date: 1/17/17
 * Time: 9:11 PM
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class CompanyLocationRegion extends Model
{
    public $table = "company_location_region";
    protected $fillable = ['company_location_id', 'region_id'];

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }
}