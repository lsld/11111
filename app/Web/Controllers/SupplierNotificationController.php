<?php
namespace Web\Controllers;
use Illuminate\Http\Request;
use Services\SupplierNotificationService;
use Services\SupplierServicesService;
use Services\Company\CompanyLocationService;
use App\Models\JobTypes;

class SupplierNotificationController extends Controller
{
    private $companyLocationService;
    private $jobTypes;
    private $notificationService;
    private $servicesService;

    public function __construct(
        CompanyLocationService $companyLocationService,
        JobTypes $jobTypes,
        SupplierNotificationService $notificationService,
        SupplierServicesService $servicesService
    ) {

        $this->companyLocationService = $companyLocationService;
        $this->jobTypes = $jobTypes;
        $this->notificationService = $notificationService;
        $this->servicesService = $servicesService;
    }

    public function showNotifications(){
        $tenant_id = tenant();
        $supplier_id = $tenant_id;
        $location_list = $this->companyLocationService->locationList($tenant_id);
        $service_list  = $this->servicesService->getSupplierServiceList($tenant_id);
        $errors = $this->checkLists($service_list, $location_list);
        $notifications = $this->notificationService->getNotificationSettings($tenant_id);
        $job_types     =  $this->jobTypes->all();

        return view('NotificationSettings.notifications')
            ->with(compact('job_types', 'notifications', 'service_list', 'location_list', 'supplier_id', 'errors' ));
    }

    public function notificationUpdate(Request $request){
        $tenant_id = tenant();
        if(isset($request['setting'])){
            $this->notificationService->updateSupplierNotifications($tenant_id, $request['setting']);
            session()->flash('alert-success', 'Notification successfully updated.');
        }
        return redirect()->back();
    }

    private function checkLists($service_list, $location_list){
        $errors = 0;
        foreach($service_list as $key => $value){
            if($service_list[1]->isEmpty() && $service_list[2]->isEmpty() && $service_list[3]->isEmpty() && $service_list[4]->isEmpty()){
                $errors = $errors + 1;
            }
        }
        if ($location_list->get()->isEmpty()){
            $errors = $errors + 1;
        }
        return $errors;
    }
}