<?php
namespace Web\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Services\Admin\JobRequestsService;

class JobRequestsController
{
    protected $service;

    public function __construct(JobRequestsService $service)
    {
        $this->service = $service;
    }

    public function lists()
    {
        $inputs = Input::all();
        $jobRequest = $this->service->viewList($inputs);
        return view('admin.jobRequests.list')
            ->with(compact('jobRequest'));
    }


    public function view($id)
    {
        $jobRequest = $this->service->viewJobRequest($id);
        return view('admin.jobRequests.view-job-request')
            ->with(compact('jobRequest'));
    }
}