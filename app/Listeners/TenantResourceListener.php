<?php

namespace App\Listeners;

use Services\SubscriptionComponentService;
use System\RulesEngine\Constants\Components;

class TenantResourceListener
{
    protected $subscriptionComponent;

    public function __construct(SubscriptionComponentService $subscriptionComponent)
    {
        $this->subscriptionComponent = $subscriptionComponent;
    }

    public function addMachines($event)
    {
        $slug = Components::MACHINES;
        try {
            return $this->subscriptionComponent->updateTenantResource($slug, $event->machines->tenant_id);
        } catch (\Exception $e) {

        }
        return true;
    }


    public function removeMachines($event){
        $slug = Components::MACHINES;
        try {
            return $this->subscriptionComponent->updateTenantResource($slug, $event->machines->tenant_id, false);
        } catch (\Exception $e) {

        }
        return true;
    }


    public function addMaterial($event)
    {
        $slug = Components::MATERIAL;
        try {
            return $this->subscriptionComponent->updateTenantResource($slug, $event->material->tenant_id);
        } catch (\Exception $e) {

        }
        return true;
    }

    public function removeMaterial($event)
    {
        $slug = Components::MATERIAL;
        try {
            return $this->subscriptionComponent->updateTenantResource($slug, $event->material->tenant_id , false);
        } catch (\Exception $e) {

        }
        return true;
    }



    public function addFill($event){
        $slug = Components::MATERIAL_FILL;

        try{
            return $this->subscriptionComponent->updateTenantResource($slug, $event->fill->tenant_id );
        }
        catch (\Exception $e) {

        }
        return true;
    }

    public function removeFill($event){
        $slug = Components::MATERIAL_FILL;

        try{
            return $this->subscriptionComponent->updateTenantResource($slug, $event->fill->tenant_id ,false);
        }
        catch (\Exception $e) {

        }
        return true;
    }



    public function addContracting($event){
        $slug = Components::CONTRACTING;

        try{
            return $this->subscriptionComponent->updateTenantResource($slug, $event->contracting->tenant_id );
        }
        catch (\Exception $e) {

        }
        return true;
    }

    public function removeContracting($event){
        $slug = Components::CONTRACTING;

        try{
            return $this->subscriptionComponent->updateTenantResource($slug, $event->contracting->tenant_id , false);
        }
        catch (\Exception $e) {

        }
        return true;
    }
}