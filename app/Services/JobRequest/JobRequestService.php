<?php

namespace Services\JobRequest;

use App\Constants\JobType;
use App\Constants\UserRole;
use App\Models\Company;
use App\Models\JobRequests;
use App\Models\JobTypes;
use App\Models\PlantHire\PlantHireProperty;
use App\Models\Quotes;
use App\Models\Role;
use App\Models\States;
use App\Models\User;
use App\Models\Region;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Services\Matching\MatchingService;

class JobRequestService
{
    protected $jobRequests;
    protected $matchingService;
    protected $quotes;

    public function __construct(JobRequests $jobRequests,
                                MatchingService $matchingService,
                                Quotes $quotes)
    {
        $this->jobRequests      = $jobRequests;
        $this->matchingService  = $matchingService;
        $this->quotes           = $quotes;
    }

    public function viewList($input)
    {
   /*     $user = Role::select('slug')->where('id', Auth::user()->role_id)->first();

        $location = User::with(['tenant' => function ($data) {
            $data->select('id');
        }])->first();
        $tenant = unwrap($location->tenant);

        $company = Company::where('tenant_id', $tenant->id)
            ->with('locations')->get();

        $company_data = unwrap($company)->locations;
        $data = $this->job_requests->with(['state', 'jobType', 'regions', 'quotes']);
*/
        $user = Auth::user();
        $tenant_id = $user->tenant_id;

        $data = $this->matchingService->matchJobsAndNotifications($tenant_id);

       /* $job_id = $data->pluck('id');
        $quotes = $this->quotes->whereIn('job_request_id', $job_id)
                                ->groupBy('job_request_id')
                                ->select('job_request_id', DB::raw('count(*) as total'))->get();

        $quotes_count = [];
        foreach($quotes->toArray() as $quot){
            $quotes_count[$quot['job_request_id']] = $quot['total'];
        }*/

        if(Input::has('job_type'))
        {
            $data->where('job_type_id', $input['job_type']);
        }
        if(Input::has('states'))
        {
            $data->where('state_id', $input['states']);
        }
        if(Input::has('status'))
        {
            $data->where('status', $input['status']);
        }

        return $data;
        /*
dd($data->get());
        if ($user->slug == UserRole::HIRER) {

            return $data->get();

        } elseif ($user->slug == UserRole::SUPPLIER) {


//            if(!empty($company_data)){
//                dd($company_data);
//                $data->where('state_id', $company_data->pluck('states_id'));
//                $data->where('regions_id', $company_data->pluck('regions_id'));
//            }

            return $data->get();

        }*/

    }

    public function viewJobRequest($id)
    {
        $job_type = $this->jobRequests->where('id', $id)->with('jobType')->first();

        if(isset($job_type)){
            switch ($job_type->job_type_id) {
                case 1:
                    return $this->getPlantHireData($id);
                    break;
                case 2:
                    return $this->getConstractingData($id);
                    break;
                case 3:
                    return $this->getMeterialData($id);
                    break;
                case 4:
                    return $this->getFillData($id);
                    break;
            }
        }

    }

    public function getCompanyData($id)
    {
        $job_type = $this->jobRequests->where('id', $id)->with('jobType')->first();

        if(isset($job_type)){
            $location = User::where('id', $job_type->user_id)->with(['tenant' => function ($data) {
                $data->select('id');
            }])->first();
            $tenant = unwrap($location->tenant);
        }
        if (isset($tenant)){
            $company_data = Company::where('tenant_id', $tenant->id)
                ->with('profile')->get();
            $company = unwrap($company_data)->profile;
        }
        if(isset($company)){
            return $company;
        }

    }

    public function getPlantHireData($id)
    {
        $requestData = $this->jobRequests->with(['jobType',
            'state', 'regions', 'users',
            'plantHire' => function($q){
                return $q->with(['equipmentType',
                    'properties' => function($r){
                        return $r->with([
                            'text', 'dynamicProperty',
                            'dropdown' => function($s){
                                return $s->with('option');
                            },
                            'multiSelect' => function($t){
                                return $t->with('option');
                            },
                            'radioButton' => function($u){
                                return $u->with('option');
                            }
                        ]);
                    }
                ]);
            }
        ])->find($id)->toArray();

        return $requestData;
    }

    public function getConstractingData($id)
    {
        $requestData = JobRequests::with(['jobType',
            'state', 'regions', 'users',
            'plantHire' => function($q){
                return $q->with(['workType',
                    'properties' => function($r){
                        return $r->with([
                            'text', 'checkBox', 'serviceDynamicProperty',
                            'dropdown' => function($s){
                                return $s->with('option');
                            },
                            'multiSelect' => function($t){
                                return $t->with('option');
                            },
                            'radioButton' => function($u){
                                return $u->with('option');
                            }
                        ]);
                    }
                ]);
            }
        ])->find($id)->toArray();

        return $requestData;
    }

    public function getMeterialData($id)
    {
        $requestData = $this->jobRequests->with(['jobType',
            'state', 'regions', 'users',
            'materialRestData' => function($q){
                $q->with('materialType');
            }
            ])->find($id)->toArray();

        return $requestData;
    }

    public function getFillData($id)
    {
        $requestData = $this->jobRequests->with(['jobType',
            'state', 'regions', 'users',
            'fillRestData' => function($q){
                $q->with('fillType');
            }
        ])->find($id)->toArray();

        return $requestData;
    }

    public function getStates()
    {
        return States::get();
    }

    public function getJobType()
    {
        return JobTypes::get();

    }

    public function getJobTypeTotals($jobTypeId, $status = 'pending'){
        $data = $this->jobRequests->where('job_type_id', $jobTypeId);
        $data->where('status', $status);
        return $data->count();
    }

    public function getRegions(){
        return Region::get();
    }

    public function getJobByRegion($regionId, $status = 'pending'){
        $data = $this->jobRequests->where('regions_id', $regionId);
        $data->where('status', $status);
        return $data->count();
    }
}