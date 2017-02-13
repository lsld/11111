<?php
/**
 * Created by PhpStorm.
 * User: maduranga
 * Date: 1/30/17
 * Time: 1:35 PM
 */

namespace Web\Controllers\Admin;

use Illuminate\Http\Request;
use Services\Admin\AdminService;
use Illuminate\Support\Facades\Input;
use App\Constants\UserStatus;

use Web\Requests\AdminUserValidation;
use Web\Requests\AdminUserValidationEdit;


class UserController
{

    protected $adminService;
    protected $userStatus = array();
    protected $enabled_states_list;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
        $this->userStatus  = [
                UserStatus::ACTIVATED   =>  'ACTIVATED',
                UserStatus::DEACTIVATED =>  'DEACTIVATED',
                UserStatus::SUSPEND     =>  'SUSPEND',
                UserStatus::DELETED     =>  'DELETED'
            ];

        //$this->enabled_states_list = $this->adminService->getAdminStatusList();
    }

    public function view($id){

        $user_data = $this->adminService->getUserData($id);

        $admin_user_role = $this->adminService->getUserRole();

        $current_role = 'view';
        $enabled_states_list = $this->adminService->getAdminStatusList();

        return view('admin.user.create')->with(compact('admin_user_role', 'user_data', 'current_role', 'id', 'enabled_states_list'));
    }

    public function edit($id){

        $user_data = $this->adminService->getUserData($id);

        $admin_user_role = $this->adminService->getUserRole();

        $current_role = 'edit';
        $enabled_states_list = $this->adminService->getAdminStatusList();

        return view('admin.user.create')->with(compact('admin_user_role', 'user_data', 'current_role', 'id', 'enabled_states_list'));
    }

    public function update($id, AdminUserValidationEdit $request){

        $this->adminService->updateUserData($id, $request);
        return redirect()->route('admin.user.list')->with('message.success', 'Admin User Updated Successfully');
    }

    public function changeStatus($id, $status){
        
        $this->adminService->changeStatus($id, $status);

        return back()->with('message.success', 'Successfully Changed User Status');
    }

    public function userList(){

        $inputs = Input::all();
        $userStatus = $this->userStatus;
        $admin_user_role = $this->adminService->getUserRole();

        $userList   = $this->adminService->viewList($inputs);
        $deleteList = $this->adminService->getDeletedList();

        return view('admin.user.list')->with(compact('userList', 'userStatus', 'admin_user_role', 'deleteList'));
    }

    public function validate(AdminUserValidation $request){
        return 'true';
    }

    public function validateEdit(AdminUserValidationEdit $request){
        return 'true';
    }

    public function store(AdminUserValidation $request){

        $this->adminService->createAdminUser($request);

        return redirect()->route('admin.user.list')->with('message.success', 'Admin User Created Successfully');

    }

    public function create(){

        $admin_user_role = $this->adminService->getUserRole();
        $current_role = 'create';
        $enabled_states_list = $this->adminService->getAdminStatusList();

        return view('admin.user.create')->with(compact('admin_user_role', 'current_role', 'enabled_states_list'));

    }
}