<?php

namespace Services;


use App\Constants\TenantStatus;
use App\Models\Tenant;

class TenantService
{
    private $tenant;
    private $tenantPlan;
    private $subscriptionComponent;

    public function __construct(
        Tenant $tenant,
        TenantPlanService $tenantPlan,
        SubscriptionComponentService $subscriptionComponentService
    ) {
        $this->tenant = $tenant;
        $this->tenantPlan = $tenantPlan;
        $this->subscriptionComponent = $subscriptionComponentService;
    }

    public function create($data, $type)
    {
        return $this->tenant->create(
            $this->attributes(func_get_args())
        );
    }

    private function attributes($attributes)
    {
        return [
            "status" => TenantStatus::ACTIVATED,
            "type" => $attributes[1]
        ];
    }

    public function createSubscription($tenantId, $plan)
    {
        $this->tenant = $this->tenant->find($tenantId);
        $this->createSubscriptionComponents($plan);
        $this->tenantPlan->createHistory($tenantId, $plan);
        return $this->tenant->tenantPlan()->create([
            'plan_id' => $plan->id,
            'status' => false,
            'start_date' => $plan->start_date,
            'end_date' => $plan->end_date
        ]);
    }

    public function createSubscriptionComponents($plan)
    {
        $data = [];
        $components = $plan->subscriptionComponents;
        if (!empty($components)) {
            foreach ($components as $component) {
                $data[] = [
                    'tenant_id' => $this->tenant->id,
                    'subscription_component_id' => $component->id
                ];
            }
            $this->subscriptionComponent->insert($data);
        }
        return true;
    }

    public function updateStatus($tenantId, $status)
    {
        $tenant = $this->tenant->find($tenantId);
        $tenant->status = $status;
        $tenant->save();
        return true;
    }
}