<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ["name", "tenant_id",];

    public function byTenant($tenant_id)
    {
        return $this->where("tenant_id", $tenant_id)->first();
    }

    public function profile()
    {
        return $this->hasOne(CompanyProfile::class);
    }

    public function  tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function locations()
    {
        return $this->hasMany(CompanyLocation::class);
    }

    public function documents()
    {
        return $this->hasMany(CompanyDocument::class);
    }

    public function isOwner()
    {
        return $this->tenant_id == tenant();
    }

    
}
