<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyLocation extends Model
{
    protected $fillable = [
                "name",
                "description",
                "street_address_1",
                "street_address_2",
                "states_id",
                "regions_id",
                "suburb",
                "post_code",
                "phone",
                "mobile",
                "email",
                "company_id",
                "fax",
                "membership_id",
                "type"
        ];

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function states()
    {
        return $this->belongsTo(States::class, 'states_id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'regions_id');
    }

    public function inline()
    {
        return $this->street_address_1.", ".$this->region->name.", ".$this->states->name;
    }

    public function companyLocationRegion()
    {
        return $this->hasMany(CompanyLocationRegion::class, 'company_location_id');
    }
}
