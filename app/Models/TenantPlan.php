<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TenantPlan extends Model
{
    protected $table = 'tenant_plan';

    protected $fillable = ['status', 'start_date', 'end_date', 'tenant_id', 'plan_id'];

    /* Relations */

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    /* End of Relations */


    public function subscribedTenantPlan($tenantId)
    {
        $plan = $this->with([
            'plan' => function ($q) {
                $q->with(['subscriptionCategory', 'subscriptionComponents']);
            }
        ])->where('tenant_id', $tenantId)->first();

        return $plan;
    }
}