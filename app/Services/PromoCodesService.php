<?php
namespace Services;
use App\Constants\Services;
use App\Models\PromoCodes;
use Illuminate\Support\Facades\Input;


class PromoCodesService
{
    //protected  $viewList;
    protected $promoCodes;

    public function __construct(PromoCodes $promoCodes)
    {
        $this->promoCodes = $promoCodes;
    }


    public function viewList(){

        $inputs = Input::all();
        $data = PromoCodes::where('status', '<>', ' 0');
        //$data = $this->promoCodes->get();

        if(Input::has('state')){
            $data = $data->where('state' , 'LIKE', '%'.$inputs['state'].'%');
        }
        
        if(Input::has('serach')){ 
            $data = $data->where('code_name' , 'LIKE', '%'.$inputs['serach'].'%');
        }
        
        if(Input::has('from')){ 
            $data = $data->whereBetween('from_date' , array(date('Y-m-d', strtotime($inputs['from'])), date('Y-m-d', strtotime($inputs['to']))));
        }

        if(Input::has('status')){ 
            $data = $data->whereIn('status', [$inputs['status']]);
        }
        //$this->viewList = $data;

        return $data->get();
    }

    public function changeStatus($id, $status){
        $data = $this->promoCodes->find($id);
        $data->status = $status;

        $data->save();
        return;
    }
    
    public function createPromoCode($data){
        $from_date = date('Y-m-d', strtotime($data['from_date']));
        $to_date   = date('Y-m-d', strtotime($data['to_date']));
        //dd(implode(',', $data['states_id']));
        $this->promoCodes->create([
                            'code_name'         => $data['code_name'],
                            'code_id'           => $data['code_id'],
                            'state'             => implode(',', $data['states_id']),
                            'discount'          => $data['discount'],
                            'description'       => $data['description'],
                            'from_date'         => $from_date,
                            'to_date'           => $to_date,
                            'role_id'           => $data['admin_user_role'],
                            'status'            => $data['status'],
                            'created_by'        => user()->username
                        ]);
    }
    
    public function getCodeData($id){
        return $this->promoCodes->find($id);
    }
    
    public function updatePromoCode($id, $data){ 
        $from_date = date('Y-m-d', strtotime($data['from_date']));
        $to_date   = date('Y-m-d', strtotime($data['to_date']));
        $state_id = implode(',', $data['states_id']);
        $data = $this->promoCodes->find($id);
        $data->code_name       = $data['code_name'];
        $data->code_id           = $data['code_id'];
        $data->state             = $state_id;
        $data->discount          = $data['discount'];
        $data->description       = $data['description'];
        $data->from_date         = $from_date;
        $data->to_date           = $to_date;
        $data->status            = $data['status'];
        $data->created_by        = user()->username;
        $data->save();

        return;
    }
}