<?php
namespace Web\Controllers\Admin;
use Services\Admin\HirerService;
use App\Constants\UserStatus;


class HirerController
{
    protected $hirerService;
    protected $userStatus = array();

    public function __construct(HirerService $hirerService)
    {

        $this->hirerService = $hirerService;
        $this->userStatus  = [
            UserStatus::ACTIVATED   =>  'ACTIVATED',
            UserStatus::DEACTIVATED =>  'DEACTIVATED',
            UserStatus::SUSPEND     =>  'SUSPEND',
            UserStatus::DELETED     =>  'DELETED'
        ];
    }

    public function hirerList(){

        $hirerStatus = $this->userStatus;

        $hirer_list  = $this->hirerService->viewList();

        $deleteList     = $this->hirerService->getDeletedList();

        return view('admin.hirer.list')->with(compact('hirer_list', 'hirerStatus', 'deleteList'));
    }

    public function changeStatus($id, $status)
    {
        $this->hirerService->changeStatus($id, $status);
        return back()->with('message.success', 'Successfully Changed User Status');
    }

    public function view($id){
        $hirer_list  = $this->hirerService->viewItem($id);
        return view('admin.hirer.view')->with(compact('hirer_list'));
    }
}