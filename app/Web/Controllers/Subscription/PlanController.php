<?php

namespace Web\Subscription\Controllers;

use Services\PlanService;
use Web\Controllers\Controller;

class PlanController extends Controller
{
    private $plan;

    public function __construct(PlanService $plan)
    {
        $this->plan = $plan;
    }

    public function create(\Request $request)
    {
        //TODO view
    }

    public function update(\Request $request)
    {
        //TODO view
    }

    public function all()
    {
        //TODO view
    }

    public function show($id)
    {
        //TODO view
    }

    public function store(\Request $request)
    {
        //TODO add request validator
        $data = $request->all();
        $this->plan->save($data);

    }
}