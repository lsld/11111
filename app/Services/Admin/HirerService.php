<?php
namespace Services\Admin;
use App\Constants\UserStatus;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;


class HirerService
{
    protected  $user;
    protected  $viewList;

    public function __construct(User $user)
    {
        $this->user = $user;
    }


    public function viewList(){

        $admin_states_list = Auth::User()->admin_states_list;

        $inputs = Input::all();
        $data = $this->user->where('role_id', 4)->with('loginLog')->get();

        $user_id_list = [];
        if($admin_states_list){
            foreach ($data as $list) {

                $locations = $list->companies->locations;
                $state_list = $locations->pluck('states_id');


                $add_to_list = false;

                foreach ($admin_states_list as $state) {
                    if(in_array($state , $state_list->toArray())){
                        $add_to_list = true;
                    }
                }

                if($add_to_list){
                    $user_id_list[] = $list->id;
                }
            }

            $data = $data->whereIn('id', $user_id_list);
        }

        if(Input::has('status')){
            $data = $data->whereIn('status', [$inputs['status']]);
        }
        $this->viewList = $data;
        

        return $data;
    }


    public function getDeletedList(){

        return $this->viewList->whereIn('status', [UserStatus::DELETED]);
    }

    public function changeStatus($id, $status){
        $data = $this->user->find($id);
        $data->status = $status;

        $data->save();
        return;
    }

    public function viewItem($id){
        $data = $this->user->where('id', $id)->where('role_id', 4)->with('loginLog')->get();
        return $data;
    }
}