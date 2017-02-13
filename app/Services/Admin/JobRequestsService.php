<?php
namespace Services\Admin;
use App\Models\JobRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class JobRequestsService
{
    protected $jobRequests;

    public function __construct(JobRequests $jobRequests)
    {
        $this->jobRequests = $jobRequests;
    }

    public function viewList($input)
    {
        $admin_states_list = Auth::User()->admin_states_list;

        $data = $this->jobRequests->with(['state', 'jobType', 'regions', 'quotes']);

        $job_id_list = [];
        if($admin_states_list){
            foreach ($data->get() as $list) {
                if(in_array($list->state_id, $admin_states_list)){
                    $job_id_list[] = $list->id;
                }
            }
            $data = $data->whereIn('id', $job_id_list);
        }

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

        if(Input::has('expiry_date'))
        {
            $expiry_date = date('Y-m-d H:i:s', strtotime($input['expiry_date']));
            $data->where('expiry_date', $expiry_date);
        }

        if(Input::has('required_date'))
        {
            $required_date = date('Y-m-d H:i:s', strtotime($input['required_date']));
            $data->where('required_date', $required_date);
        }

        if(Input::has('created_date'))
        {
            $created_date = date('Y-m-d H:i:s', strtotime($input['created_date']));
            $data->whereDate('created_at', $created_date);
        }

        return $data->get();
    }

    public function viewJobRequest($id)
    {
        $data = $this->jobRequests->where('id',$id)->orderBy('id', 'desc')->with(['state', 'jobType', 'regions', 'quotes'])->first();
        return $data;
    }
}