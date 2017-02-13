<?php

namespace Web\ViewComposers;

use App\Models\Plan;
use Illuminate\View\View;

class PlanComposer
{

    /**
     * @var Plan
     */
    private $plan;

    public function __construct(Plan $plan)
    {
        $this->plan = $plan;
    }

    public function compose(View $view)
    {
        $view->with('categories', $this->plan->formattedList());
    }

}