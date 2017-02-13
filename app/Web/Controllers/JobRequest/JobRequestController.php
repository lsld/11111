<?php

namespace Web\Controllers\JobRequest;

use Illuminate\Support\Facades\Input;
use App\Models\IndustryCertification;
use Services\JobRequest\JobRequestService;
use Services\SupplierQuoatesService;
use Services\Company\CompanyProfileService;
use Services\Company\CompanyService;

class JobRequestController
{
    protected $service;

    protected $profile;

    protected  $supplierQuoatesService;

    protected $certificate;

    protected $companyLocation;

    public function __construct(JobRequestService $service,
                                SupplierQuoatesService $supplierQuoatesService,
                                CompanyProfileService $profile,
                                IndustryCertification $certificate,
                                CompanyService $companyLocations)
    {
        $this->service = $service;
        $this->supplierQuoatesService = $supplierQuoatesService;
        $this->profile = $profile;
        $this->certificate = $certificate;
        $this->CompanyService = $companyLocations;
    }

    public function lists()
    {
        $inputs = Input::all();
        $jobRequest = $this->service->viewList($inputs);
        $states = $this->service->getStates();
        $jobType = $this->service->getJobType();
        

        return view('job_requests.listJobRequest')
            ->with(compact('jobRequest', 'states', 'jobType'));

    }

    public function view($id)
    {

        $companyProfile = $this->service->getCompanyData($id);
        $jobRequest = $this->service->viewJobRequest($id);
        $check = $this->supplierQuoatesService->checkJobRequest($id);

        return view('job_requests.view-job-request')
            ->with(compact('jobRequest', 'check', 'companyProfile'));
    }

}
