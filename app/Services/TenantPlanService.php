<?php

namespace Services;

use App\Models\Tenant\TenantPlanHistory;
use App\Models\TenantPlan;

class TenantPlanService
{
    private $tenantPlan;
    private $history;

    public function __construct(TenantPlan $tenantPlan, TenantPlanHistory $history)
    {
        $this->tenantPlan = $tenantPlan;
        $this->history = $history;
    }

    public function plan($tenantId)
    {
        return $this->tenantPlan->subscribedTenantPlan($tenantId);
    }

    public function createHistory($tenantId, $plan)
    {
        $this->history->create([
            'description' => $plan->toJson(),
            'tenant_id' => $tenantId,
            'plan_id' => $plan->id
        ]);
    }
}