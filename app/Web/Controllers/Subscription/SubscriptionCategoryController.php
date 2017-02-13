<?php


namespace Web\Subscription\Controllers;

use Services\SubscriptionCategoryService;
use Web\Controllers\Controller;

class SubscriptionCategoryController extends Controller
{
    private $category;

    public function __construct(SubscriptionCategoryService $category)
    {
        $this->category = $category;
    }

    public function create()
    {
        //TODO return view
    }

    public function store(\Request $request)
    {
        $data = $request->all();
        $this->category->save($data);
    }
}