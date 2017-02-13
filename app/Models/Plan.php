<?php


namespace App\Models;

use App\Models\Subscription\SubscriptionCategory;
use App\Models\Subscription\SubscriptionComponent;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = ['name', 'price_member', 'price_non_member', 'subscription_category_id'];

    protected $hidden = ['created_at', 'updated_at'];

    /* Relations */

    public function subscriptionCategory()
    {
        return $this->belongsTo(SubscriptionCategory::class);
    }

    public function subscriptionComponents()
    {
        return $this->belongsToMany(SubscriptionComponent::class, 'plan_subscription_component', 'plan_id')
            ->withPivot(['quantity', 'is_limit']);
    }

    /* End of Relations */


    public function scopeWithRelated($query)
    {
        return $query->with(['subscriptionCategory', 'subscriptionComponents']);
    }

    public function formattedList()
    {
        $formatted = $categories = $plans = [];

        $rawPlans = $this->withRelated()->get();
        if (count($rawPlans)) {
            foreach ($rawPlans as $plan) {
                $category = ['id' => $plan->subscriptionCategory->id, 'name' => $plan->subscriptionCategory->name];

                $components = collect($plan->subscriptionComponents)->map(function ($component) {
                    $component->quantity = $component->pivot->quantity;
                    unset($component->pivot);
                    return $component->toArray();
                });

                $categoryPlans = [
                    'id' => $plan->id,
                    'name' => $plan->name,
                    'price_member' => $plan->price_member,
                    'price_non_member' => $plan->price_non_member,
                    'components' => $components
                ];

                $categories[$plan->subscriptionCategory->id] = $category;
                $plans[$plan->subscriptionCategory->id][$plan->id] = $categoryPlans;

            }

            if (count($categories)) {
                foreach ($categories as $key => $category) {

                    $formatted[$key] = $category;
                    $formatted[$key]['plans'] = $plans[$key];

                }
            }
            return $formatted;
        }
    }
}