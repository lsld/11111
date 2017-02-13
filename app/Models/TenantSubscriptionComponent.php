<?php

namespace App\Models;

use App\Models\Subscription\SubscriptionComponent;
use Illuminate\Database\Eloquent\Model;

class TenantSubscriptionComponent extends Model
{
    protected $table = 'tenant_subscription_component';
    protected $fillable = ['consumption', 'subscription_component_id', 'tenant_id'];
    protected $hidden = ['created_at', 'updated_at'];

    /* Relations */

    public function subscriptionComponent()
    {
        return $this->belongsTo(SubscriptionComponent::class);
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    /* End of Relations */

    public function getTenantComponents($tenantId)
    {
        return $this->with(['subscriptionComponent'])->where('tenant_id', $tenantId)->get();
    }

    public function getTenantComponentBySlug($slug, $tenantId)
    {
        return $this->with(['subscriptionComponent'])->whereHas('subscriptionComponent',
            function ($q) use ($slug, $tenantId) {
                $q->where('slug', $slug);
            })->where('tenant_id', $tenantId)->first();
    }

}