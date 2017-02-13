<?php

namespace Services;

use App\Models\TenantSubscriptionComponent;

class SubscriptionComponentService
{
    private $subscriptionComponent;

    public function __construct(TenantSubscriptionComponent $subscriptionComponent)
    {
        $this->subscriptionComponent = $subscriptionComponent;
    }

    public function insert($data)
    {
        return $this->subscriptionComponent->insert($data);
    }

    public function getTenantComponents($tenantId)
    {
        return $this->subscriptionComponent->getTenantComponents($tenantId);
    }

    public function getTenantComponentBySlug($slug, $tenantId)
    {
        return $this->subscriptionComponent->getTenantComponentBySlug($slug, $tenantId);
    }

    public function updateTenantResource($slug, $tenantId, $isIncrement = true)
    {
        $component = $this->subscriptionComponent->getTenantComponentBySlug($slug, $tenantId);
        if ($isIncrement) {
            $component->consumption++;
        }
        if (!$isIncrement) {
            $component->consumption--;
        }
        return $component->save();
    }

}