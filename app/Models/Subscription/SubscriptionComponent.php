<?php

namespace App\Models\Subscription;

use Illuminate\Database\Eloquent\Model;

class SubscriptionComponent extends Model
{
    protected $fillable = ['subscription_component_id', 'quantity'];

    protected $hidden = [];

    /* Relations */

    public function planComponents()
    {
        return $this->belongsToMany(Plan::class, 'plan_subscription_component', 'subscription_component_id', 'plan_id')
            ->withPivot(['quantity', 'is_limit']);
    }

    /* End of Relations */

}