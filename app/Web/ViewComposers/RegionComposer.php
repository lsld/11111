<?php

namespace Web\ViewComposers;

use App\Models\Region;
use App\Models\States;
use Illuminate\View\View;

class RegionComposer
{


    /**
     * @var Region
     */
    private $region;

    public function __construct(Region $region)
    {

        $this->region = $region;
    }


    public function compose(View $view)
    {
        $view->with('regions', $this->region->all());
    }
}