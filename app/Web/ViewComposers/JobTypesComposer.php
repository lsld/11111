<?php

namespace Web\ViewComposers;

use App\Models\JobTypes;
use Illuminate\View\View;

class JobTypesComposer
{
    /**
     * @var JobTypes
     */
    private $jobTypes;

    public function __construct(JobTypes $jobTypes)
    {

        $this->jobTypes = $jobTypes;
    }


    public function compose(View $view)
    {
        $view->with('jobType', $this->jobTypes->all());
    }
}