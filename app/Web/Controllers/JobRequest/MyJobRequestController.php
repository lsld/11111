<?php

namespace Web\Controllers\JobRequest;
use App\Constants\QuoteStatus;
use Illuminate\Http\Request;
use App\Models\IndustryCertification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Services\SupplierQuoatesService;
use Services\JobRequest\MyJobRequestService;
use Services\Company\CompanyProfileService;

class MyJobRequestController
{
    protected $service;
    protected $role_id;
    protected $profile;
    protected $certificate;
    protected $SupplierQuoatesService;

    protected $quoteStatus = array();

    public function __construct(MyJobRequestService $service, SupplierQuoatesService $supplierQuoatesService,
                                IndustryCertification $certificate,CompanyProfileService $profile)
    {
        $this->service = $service;
        $this->supplierQuoatesService = $supplierQuoatesService;
        $this->certificate = $certificate;
        $this->profile = $profile;

        $this->quoteStatus  = [
          QuoteStatus::PENDING => 'pending',
          QuoteStatus::ACCEPTED => 'accepted',
          QuoteStatus::REJECTED => 'rejected',
          QuoteStatus::WITHDRAW => 'withdraw'
        ];
    }

    public function lists()
    {
        $inputs = Input::all();
        $jobRequest = $this->service->viewList($inputs);
        $states = $this->service->getStates();
        $jobType = $this->service->getJobType();;
        $role_id = Auth::user()->role_id;
        return view('job_requests.listMyJobRequest')
            ->with(compact('jobRequest', 'states', 'jobType', 'role_id'));

    }

    public function view($id)
    {
        $jobRequestId       = $id;
        $quoteByJobRequest  = $this->supplierQuoatesService->quotesByJobRequest($jobRequestId);

        $companyProfile     = $this->service->getCompanyData($id);
        $jobRequest         = $this->service->viewJobRequest($id);

        $role_id            = Auth::user()->role_id;

        return view('job_requests.view-my-job-request')
            ->with(compact('jobRequest', 'check', 'companyProfile', 'role_id', 'id', 'quoteByJobRequest'));
    }

    public function viewQuote($quote_id){
        $quoteStatus = $this->quoteStatus;

        $quote = $this->supplierQuoatesService->getQuoteById($quote_id);

        $company = $this->profile->findByTenant($quote->tenant_id);
        $ImagePath = $this->certificate->getImagePath();


        return view('job_requests.view-quote')
            ->with(compact('company','ImagePath','quote','quoteStatus'));
    }

    public function changeQuoteStatus(Request $request){
        $quote_id =  $request['quote_id'];
        $status = $request['status'];

        $this->supplierQuoatesService->changeStatus($quote_id, $status);

        session()->flash('alert-success', 'Success.');
        return redirect()->back();
    }
}