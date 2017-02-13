<?php
/**
 * Created by PhpStorm.
 * User: maduranga
 * Date: 2/3/17
 * Time: 11:41 AM
 */

namespace Web\Controllers\Admin;

use App\Constants\UserStatus;
use App\Models\IndustryCertification;
use App\Models\JobTypes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

use Services\Company\CompanyLocationService;
use Services\Company\CompanyProfileService;
use Services\Supplier\NotificationService;
use Services\Supplier\ServicesService;
use Services\Supplier\SupplierService;
use Services\SupplierRegistrationService;
use Web\Requests\SupplierSingUpLocationRequest;


class SupplierController
{

    protected $supplierService;
    protected $userStatus = array();
    protected $companyLocationService;
    protected $user;
    protected $tenant_id;
    protected $supplierRegistration;
    protected $servicesService;
    protected $notificationService;
    protected $profile;
    protected $certificate;

    public function __construct(
        SupplierService         $supplierService,
        CompanyLocationService  $companyLocationService,
        User                    $user,
        SupplierRegistrationService $supplierRegistration,
        ServicesService         $servicesService,
        NotificationService     $notificationService,
        CompanyProfileService   $profile,
        IndustryCertification   $certificate
    )
    {

        $this->supplierService = $supplierService;
        $this->userStatus  = [
            UserStatus::ACTIVATED   =>  'ACTIVATED',
            UserStatus::DEACTIVATED =>  'DEACTIVATED',
            UserStatus::SUSPEND     =>  'SUSPEND',
            UserStatus::DELETED     =>  'DELETED'
        ];
        $this->companyLocationService = $companyLocationService;
        $this->user = $user;
        $this->supplierRegistration = $supplierRegistration;
        $this->servicesService      = $servicesService;
        $this->notificationService  = $notificationService;

        $this->profile = $profile;
        $this->certificate = $certificate;
    }

    public function view($id){

        $tenant_id = $this->tenant_id = $this->user->find($id)->tenant_id;
        $supplier_id = $id;

        $location_list = $this->companyLocationService->locationList($this->tenant_id);
        $service_list  = $this->servicesService->getSupplierServiceList($this->tenant_id);
        $notifications = $this->notificationService->getNotificationSettings($this->tenant_id);
        $job_types     = JobTypes::all();

        $company       = $this->profile->findByTenant($this->tenant_id);
        $imagePath     = $this->certificate->getImagePath();
        
        return view('admin.supplier.manage-suppliers')
            ->with(compact('job_types', 'notifications', 'service_list', 'location_list', 'supplier_id', 'company', 'imagePath', 'tenant_id' ));

    }

    public function supplierList(){
        
        $supplierStatus = $this->userStatus;
        $supplier_list  = $this->supplierService->viewList();
        
        $deleteList     = $this->supplierService->getDeletedList();

        return view('admin.supplier.list')->with(compact('supplier_list', 'supplierStatus', 'deleteList'));
    }

    public function changeStatus($id, $status){

        $this->supplierService->changeStatus($id, $status);

        return back()->with('message.success', 'Successfully Changed User Status');
    }

    /***    Supplier Notification Manage ***/

    public function notificationUpdate($supplier_id, Request $request){

        $this->tenant_id = $this->user->find($supplier_id)->tenant_id;

        if(isset($request['setting'])){
            
            $this->notificationService->updateSupplierNotifications($this->tenant_id, $request['setting']);
            session()->flash('alert-success', 'Location successfully updated.');
            
        }
        return 'true';
    }

    public function notificationLoad($supplier_id){

        $this->tenant_id = $this->user->find($supplier_id)->tenant_id;

        $location_list = $this->companyLocationService->locationList($this->tenant_id);
        $service_list  = $this->servicesService->getSupplierServiceList($this->tenant_id);
        $notifications = $this->notificationService->getNotificationSettings($this->tenant_id);
        $job_types     = JobTypes::all();

        return view('admin.supplier.notifications')
            ->with(compact('job_types', 'notifications', 'service_list', 'location_list', 'supplier_id' ));
    }

    /***    End Notification Manage ***/

    /***    Supplier Location Manage ***/

    public function editLocation($supplier_id, $id){

        $data = $this->companyLocationService->getLocationData($id);
        //dd($data->toArray());
        return $data->toArray();
    }

    public function updateLocation($supplier_id, $id, SupplierSingUpLocationRequest $request){

        $this->tenant_id    = $this->user->find($supplier_id)->tenant_id;

        $this->companyLocationService->updateCompanyLocation($this->tenant_id , $request->all(), $id);
        session()->flash('alert-success', 'Location successfully updated.');

        return 'true';
    }

    public function storeLocationList($supplier_id){

        $this->tenant_id = $this->user->find($supplier_id)->tenant_id;
        $location_list = $this->companyLocationService->locationList($this->tenant_id);
        return view('admin.supplier.location_list')->with(compact('location_list', 'supplier_id' ));
    }

    public function storeLocation($supplier_id, SupplierSingUpLocationRequest $request){

        $this->tenant_id    = $this->user->find($supplier_id)->tenant_id;
        $company_id         = $this->supplierRegistration->companyIdByTenant($this->tenant_id);

        $this->supplierRegistration->addLocation($request->all(), $company_id);

        session()->flash('alert-success', 'Location successfully added.');

        return 'true';
    }

    public function deleteLocation($supplier_id, $id){

        $this->tenant_id    = $this->user->find($supplier_id)->tenant_id;
        $this->companyLocationService->deleteCompanyLocation($this->tenant_id, $id);
        session()->flash('alert-success', 'Location successfully deleted.');

        return 'true';
    }

    /***    End Supplier Location manage ***/
}