<?php

namespace Services\Admin;

use App\Models\Admin\UserRole;
use App\Models\User;
use App\Constants\UserStatus;
use Illuminate\Support\Facades\Auth;
use Services\UserService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;


class AdminService
{

    protected $userRole;
    protected $user;
    protected $userService;

    private $viewList;

    public function __construct(
                            UserRole    $userRole,
                            User        $user,
                            UserService $userService
                        )
    {
        $this->userRole     = $userRole;
        $this->user         = $user;
        $this->userService  = $userService;
    }

    function getAdminStatusList(){

        if(Auth::User()->role_id==2){
            $data = $this->user->with('loginLog')->find(Auth::User()->id);
            return $data->admin_states_list;
        }
        return null;
    }

    public function updateUserData($id, $request){

        $data = $this->user->find($id);
        $data->first_name       = $request['first_name'];
        $data->last_name        = $request['last_name'];
        $data->last_name        = $request['last_name'];
        $data->admin_states_ids = serialize($request['state_id']);
        $data->save();
        return;
    }

    public function getUserData($id){

        return $this->user->with('loginLog')->find($id);
    }

    public function changeStatus($id, $status){

        $data = $this->user->find($id);
        $data->status = $status;

        $data->save();
        return;
    }

    public function viewList($inputs){

        $data = $this->user->whereIn('role_id', [1,2])->with('loginLog')->get();
        ///$data = $data->orderBy('id','DESC');

        $user_enable_states_list = $this->getAdminStatusList();
        if($user_enable_states_list){/* filter enabled states list */
            $list_id = [];
            foreach ($data as $users){
                if($users->admin_states_list){
                    foreach ($user_enable_states_list as $en_state){
                        if(in_array($en_state, $users->admin_states_list)){
                            $list_id[] = $users->id;
                        }
                    }
                }

            }

            $data = $data->whereIn('id', $list_id);
        }

        if(Input::has('state_id')){

            $list_id = [];
            foreach ($data as $users){
                if($users->admin_states_list){
                    if(in_array($inputs['state_id'], $users->admin_states_list)){
                        $list_id[] = $users->id;
                    }
                }

            }

            $data = $data->whereIn('id', $list_id);
        }

        $this->viewList = $viewList = $data;

        if(Input::has('status')){
            return $viewList->whereIn('status', [$inputs['status']]);
        }

        return $viewList;
    }

    public function getDeletedList(){

        return $this->viewList->whereIn('status', [UserStatus::DELETED]);
    }

    public function getUserRole(){

        $current_user_role = Auth::User()->role_id;
        if($current_user_role==2){
            return $this->userRole->whereIn('id', [2])->get();
        }
        return $this->userRole->get();
    }

    public function createAdminUser($data){
       
        $user = $this->user->create([
                            'first_name'        => $data['first_name'],
                            'last_name'         => $data['last_name'],
                            'admin_states_ids'  => serialize($data['state_id']),
                            'email'             => $data['email'],
                            'phone'             => $data['phone'],
                            'admin_user_role'   => $data['admin_user_role'],
                            'username'          => $data['username'],
                            'password'          => Hash::make($data['password']),
                            'role_id'           => $data['admin_user_role'],
                            'avatar'            => !isset($data['avatar'])?"default.jpg":$data['avatar'],
                            'status'            => UserStatus::DEACTIVATED,
                        ]);

        $user->sendActivationLink();
    }
}