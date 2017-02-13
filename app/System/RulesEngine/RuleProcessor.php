<?php

namespace System\RulesEngine;

use Services\SubscriptionComponentService;
use Services\TenantPlanService;
use System\RulesEngine\Contracts\RuleProcessorInterface;
use System\RulesEngine\Handlers\RuleHandler;

class RuleProcessor implements RuleProcessorInterface
{
    protected $ruleTemplate = [];
    private $user;
    private $ruleHandler;
    private $plan;
    private $component;

    public function __construct(
        RuleHandler $ruleHandler,
        TenantPlanService $plan,
        SubscriptionComponentService $component
    ) {
        $this->ruleHandler = $ruleHandler;
        $this->plan = $plan;
        $this->component = $component;
        $this->user = user();
    }


    public function validate($action, $tenantId = null)
    {
        if (empty($tenantId)) {
            $tenantId = user()->tenant_id;
        }
        $this->setProperties($action, $tenantId);
        $this->isValidRequest();
        //TODO let the rule handler do the job temporarily checking values
        return $this->validateRule($action);
        //  return $this->ruleHandler->handle($this->components);
    }


    private function setProperties($action, $tenantId)
    {
        $this->ruleTemplate = $this->getRuleTemplate($tenantId);
        $this->setResourcesConsumption($tenantId);
    }

    private function getRuleTemplate($tenantId)
    {
        //TODO cache
        $template = [];
        $tenantPlan = $this->getTenantPlan($tenantId);
        if (isset($tenantPlan->plan->subscriptionComponents)
            && !empty($tenantPlan->plan->subscriptionComponents)
        ) {
            foreach ($tenantPlan->plan->subscriptionComponents as $component) {
                $template[$component->slug] = [
                    'id' => $component->id,
                    'slug' => $component->slug,
                    'value' => $component->pivot->quantity,
                    'is_limit' => $component->pivot->is_limit,
                    'type' => 'limit'
                ];
            }
        }
        return $template;
    }

    private function isValidRequest()
    {
        if (!count($this->ruleTemplate)) {
            throw new \Exception('Validators not found against subscription plan!');
        }
    }

    private function validateRule($action)
    {
        if (!isset($this->ruleTemplate[$action])) {
            throw new \Exception('Validation not found.');
        }
        return $this->validateResource($this->ruleTemplate[$action]);
    }

    private function setResourcesConsumption($tenantId)
    {
        $resources = [];
        $tenantResources = $this->component->getTenantComponents($tenantId);

        if (!empty($tenantResources)) {
            foreach ($tenantResources as $resource) {
                $slug = $resource->subscriptionComponent->slug;
                $this->ruleTemplate[$slug]['consumption'] = $resource->consumption;
            }
        }
        return $resources;
    }

    private function getTenantPlan($tenantId)
    {
        $tenantPlan = $this->plan->plan($tenantId);
        if (empty($tenantPlan)) {
            throw new \Exception('Tenant subscription plan not found!');
        }
        return $tenantPlan;
    }

    private function validateResource($component)
    {
        switch ($component['type']) {
            case 'limit' :
                if ($component['is_limit'] == 0) {
                    return true;
                }
                return !($component['consumption'] >= $component['value']);
                break;
            default :
                return false;
                break;
        }
    }
}