<?php

namespace App\Models;

use App\Models\Subscription\SubscriptionComponent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Tenant extends Model
{
    public $fillable = [
        "status",
        "type",
        "profile_inserted",
        "locationsInserted",
        "servicesInserted",
        "notifications_inserted"
    ];

    public function tenantsServiceSettings(){

        return $this->hasMany(TenantsServiceSettings::class, 'tenant_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function sendActivationLink()
    {
        return $this->with('users')->find($this->id)->sendActivationLink();
    }


    public function plantHires()
    {
        return $this->hasMany(PlantHire::class);
    }

    public function tenantPlan()
    {
        return $this->hasOne(TenantPlan::class);
    }

    public function subscriptionComponents()
    {
        return $this->hasMany(SubscriptionComponent::class, 'tenant_id');
    }

    public function company()
    {
        return $this->hasMany(Company::class);
    }

}
