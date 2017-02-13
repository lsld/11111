<?php

namespace Web\ViewComposers;

use App\Models\States;
use Illuminate\View\View;

class StatesComposer
{
    /**
     * @var States
     */
    private $states;

    public function __construct(States $states)
    {

        $this->states = $states;
    }


    public function compose(View $view)
    {
        $view->with('states', $this->states->all());
    }
}