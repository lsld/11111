<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{

    protected $fillable = [
        "name",
        "logo",
        "phone_1",
        "phone_2",
        "email",
        "website",
        "projects",
        "services",
        "about",
        "operating_category_id",
        "company_id",
        "operating_states",
    ];

    public $logoPath = 'uploads/logos/';
    

    public function industryCertification(){
        return $this->hasMany(IndustryCertification::class, 'profile_id');
    }

    public function gallery()
    {
        return $this->hasMany(ProfileGallery::class, 'profile_id');
    }

    public function getLogoAttribute($logo)
    {
        return $logo != ""? "/".$this->logoPath.$logo:"";
    }

    public function byTenant($tenant_id)
    {
        
    }

    public function operating()
    {
        return $this->belongsTo(OperatingCategory::class, 'operating_category_id');
    }
    
    public function documents()
    {
        return $this->hasMany(CompanyDocument::class, 'company_id');
    }
    
    public function locations()
    {
        return $this->hasMany(CompanyLocation::class, 'company_id');
    }
}
