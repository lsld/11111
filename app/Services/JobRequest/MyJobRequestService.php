<?php

namespace Services\JobRequest;

use App\Constants\JobType;
use App\Models\Company;
use App\Models\JobRequests;
use App\Models\JobTypes;
use App\Models\States;
use App\Models\User;
use Illuminate\Support\Facades\Input;

class MyJobRequestService
{
    protected $jobRequests;

    public function __construct(JobRequests $jobRequests)
    {
        $this->jobRequests = $jobRequests;

    }

    public function viewList($input)
    {
        $user_id = Auth()->id();
        $data = $this->jobRequests->orderBy('id', 'desc')->with(['state', 'jobType', 'regions', 'quotes'])->where('user_id', $user_id);
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

        return $data->get();

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

}