<?php

namespace Web\ViewComposers;

use App\Models\OperatingCategory;
use Illuminate\View\View;

class OperatingCategoriesComposer
{


    /**
     * @var States
     */
    private $list;

    public function __construct(OperatingCategory $list)
    {

        $this->list = $list;
    }


    public function compose(View $view)
    {
        $view->with('operatingCategory', $this->list->all());
    }
}