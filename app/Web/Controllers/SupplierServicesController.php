<?php

namespace Web\Controllers\Auth;
namespace Web\Controllers;

use Illuminate\Http\Request;
use Services\SupplierContractService;
use Services\SupplierFillService;
use Services\SupplierMaterialService;
use Services\SupplierPlantService;
use Services\SupplierRegistrationService;
use Services\TenantPlanHistoryService;

use Web\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Web\Requests\SupplierServiceContractRequest;
use Web\Requests\SupplierServiceFillRequest;
use Web\Requests\SupplierServiceMaterialRequest;
use Web\Requests\SupplierServicePlantRequest;

class SupplierServicesController  extends Controller
{

    private $supplierPlantService;

    private $supplierContractService;

    private $supplierMaterialService;

    private $supplierFillService;

    private $supplierRegistration;

    private $tenantPlanHistoryService;


    public function __construct(
        SupplierRegistrationService $supplierRegistration,
        SupplierPlantService $supplierPlantService,
        SupplierContractService $supplierContractService,
        SupplierMaterialService $supplierMaterialService,
        SupplierFillService $supplierFillService,
        TenantPlanHistoryService $tenantPlanHistoryService

    ) {
        $this->supplierRegistration = $supplierRegistration;
        $this->supplierPlantService = $supplierPlantService;
        $this->supplierContractService = $supplierContractService;
        $this->supplierMaterialService = $supplierMaterialService;
        $this->supplierFillService = $supplierFillService;
        $this->tenantPlanHistoryService  = $tenantPlanHistoryService;
    }



    public function showService()
    {
        $tenantId = tenant();

        $itemTypes = $this->supplierPlantService->itemTypes();

        $hireTypes = $this->supplierPlantService->hireTypes();



        $accessories = $this->supplierPlantService->accessories();

        $plantHireTableData = $this->supplierPlantService->plantHireTableData($tenantId);



        $jobTypes = $this->supplierContractService->jobTypes();


        $workTypes = $this->supplierContractService->workTypes();

        $contractingTableData = $this->supplierContractService->contractingTableData($tenantId);


        $resourceTypes = $this->supplierMaterialService->resourceTypes();
        $materialTableData = $this->supplierMaterialService->materialTableData($tenantId);

        $fillTypes = $this->supplierFillService->fillType();
        $fillTableData = $this->supplierFillService->fillTableData($tenantId);


        $tenantPlanHistory = $this->tenantPlanHistoryService->getTenantPlanHistoryService(tenant())->get();

        $SericeLimitsList = array();

        foreach($tenantPlanHistory as $tenantPl){
            $description = json_decode($tenantPl->description, true);
            foreach($description['subscription_components'] as $componentKey => $componentValue){
                $SericeLimitsList[$componentValue['name']] = $componentValue['pivot']['quantity'];
            }
        }




        $availableDataIdList = [
            'plantHire'     =>  $plantHireTableData->pluck('item_category_id')->toArray(),
            'contracting'   =>  $contractingTableData->pluck('work_type_id')->toArray(),
            'material'      =>  $materialTableData->pluck('resource_type_id')->toArray(),
            'fill'          =>  $fillTableData->pluck('fill_type_id')->toArray(),
        ];


        return view('SupplierServices.supplier-services')->with(compact('itemTypes', 'hireTypes', 'accessories',
            'plantHireTableData', 'tenantId', 'jobTypes', 'jobTypes', 'workTypes', 'contractingTableData',
            'resourceTypes', 'materialTableData', 'fillTypes', 'fillTableData', 'availableDataIdList', 'SericeLimitsList'));
    }

    public function plantService(SupplierServicePlantRequest $request)
    {

        $val = $this->supplierRegistration->addService($request->all());

        if($val == false){
            session()->flash('alert-danger', 'You cannot add any more services of this type according to your subscription package.');
            return 'true';
            //return redirect()->route('show_services');
        }

        session()->flash('alert-success', 'Successfully inserted.');
        //return redirect()->route('show_services');
        return 'true';
    }

    public function contractingService(SupplierServiceContractRequest $request)
    {
        $val = $this->supplierRegistration->addService($request->all());

        if($val == false){
            session()->flash('alert-danger', 'You cannot add any more services of this type according to your subscription package.');
            //return redirect()->route('show_services');
            return 'true';
        }

        session()->flash('alert-success', 'Successfully inserted.');
        //return redirect()->route('show_services');
        return 'true';
    }

    public function materialService(SupplierServiceMaterialRequest $request)
    {
        $val = $this->supplierRegistration->addService($request->all());
        if($val == false){
            session()->flash('alert-danger', 'You cannot add any more services of this type according to your subscription package.');
            //return redirect()->route('show_services');
            return 'true';
        }

        session()->flash('alert-success', 'Successfully inserted.');
        //return redirect()->route('show_services');
        return 'true';

    }

    public function fillService(SupplierServiceFillRequest $request)
    {
        $val = $this->supplierRegistration->addService($request->all());

        if($val == false){
            session()->flash('alert-danger', 'You cannot add any more services of this type according to your subscription package.');
            //return redirect()->route('show_services');
            return 'true';
        }

        session()->flash('alert-success', 'Successfully inserted.');
        //return redirect()->route('show_services');
        return 'true';
    }

    public function deletePlant($id){
        $this->supplierPlantService->deletePlant($id);
        session()->flash('alert-success', 'Successfully deleted.');
        return redirect()->route('show_services');
    }

    public function deleteContracting($id){
        $this->supplierContractService->deleteContracting($id);
        session()->flash('alert-success', 'Successfully deleted.');
        return redirect()->route('show_services');
    }

    public function deleteMaterial($id){
        $this->supplierMaterialService->deleteMaterial($id);
        session()->flash('alert-success', 'Successfully deleted.');
        return redirect()->route('show_services');
    }

    public function deleteFill($id){
        $this->supplierFillService->deleteFill($id);
        session()->flash('alert-success', 'Successfully deleted.');
        return redirect()->route('show_services');
    }

    public function showEditPlantService($id){
    $plantService = $this->supplierPlantService->plantHireData($id);

    $itemTypes = $this->supplierPlantService->itemTypes();
    $hireTypes = $this->supplierPlantService->hireTypes();
    $accessories = $this->supplierPlantService->accessories();

    return view('SupplierServices.edit-plant-services')->with(compact('plantService','itemTypes','hireTypes','accessories'));
    }

    public function editPlantService(SupplierServicePlantRequest $request){
        $input = $request->all();
        $this->supplierPlantService->editPlantService($input);
        session()->flash('alert-success', 'Successfully updated!.');
        //return redirect()->route('show_services');
        return 'true';
    }

    public function showEditContractingService($id){
        $contractingService = $this->supplierContractService->contractingData($id);
        $jobTypes = $this->supplierContractService->jobTypes();
        $workTypes = $this->supplierContractService->workTypes();
        return view('SupplierServices.edit-contracting-services')->with(compact('contractingService','jobTypes','workTypes'));
    }

    public function editContractingService(SupplierServiceContractRequest $request){
        $input = $request->all();
        $this->supplierContractService->editContractingService($input);
        session()->flash('alert-success', 'Successfully updated!.');
        //return redirect()->route('show_services');
        return 'true';
    }

    public function showEditMaterialService($id){
        $materialService = $this->supplierMaterialService->materialData($id);
        $resourceTypes = $this->supplierMaterialService->resourceTypes();
        return view('SupplierServices.edit-material-services')->with(compact('materialService','resourceTypes'));
    }

    public function editMaterialService(SupplierServiceMaterialRequest $request){
        $input = $request->all();
        $this->supplierMaterialService->editMaterialService($input);
        session()->flash('alert-success', 'Successfully updated!.');
        //return redirect()->route('show_services');
        return 'true';
    }

    public function showEditFillService($id){
        $fillService = $this->supplierFillService->fillData($id);
        $fillTypes = $this->supplierFillService->fillType();
        return view('SupplierServices.edit-fill-services')->with(compact('fillService','fillTypes'));
    }

    public function  editFillService(SupplierServiceFillRequest $request){
        $input = $request->all();
        $this->supplierFillService->editFillService($input);
        session()->flash('alert-success', 'Successfully updated!.');
        //return redirect()->route('show_services');
        return 'true';
    }
}