<?php

namespace Web\ViewComposers;

use Illuminate\View\View;
use App\Constants\DurationList;

class DurationListComposers
{
    private $durations;

    public function __construct()
    {

        $this->durations = DurationList::DurationList;
    }


    public function compose(View $view)
    {
        $view->with('durations', $this->durations);
    }
}