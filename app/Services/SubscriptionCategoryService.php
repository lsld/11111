<?php


namespace Services;


use App\Models\Subscription\SubscriptionCategory;

class SubscriptionCategoryService
{
    private $category;

    public function __construct(SubscriptionCategory $category)
    {
        $this->category = $category;
    }

    public function save($data)
    {
        return $this->category->save($data);
    }
}