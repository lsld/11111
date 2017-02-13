<?php

namespace Web\Controllers\Auth;
namespace Web\Controllers;
use Web\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Services\Company\CompanyService;
use Services\SupplierMyAccountService;
use Illuminate\Support\Facades\Auth;
use Services\HirerRegistrationService;
use Web\Requests\SupplierMyAccountRequest;
use Services\SupplierRegistrationService;
use Services\TenantPlanHistoryService;
use Web\Requests\SupplierSingUpLocationRequest;
use App\Models\Region;
use App\Models\CompanyLocation;

class SupplierMyAccountController extends Controller
{
    /**
     * @var HirerRegistrationService
     */
    private $hirerRegistration;
    /**
     * @var SupplierRegistrationService
     */
    private $supplierRegistration;

    private $companyService;

    private $tenantPlanHistoryService;

    private $companyLocation;

    private $supplierMyAccountService;

    public function __construct(
        HirerRegistrationService $hirerRegistration,
        SupplierRegistrationService $supplierRegistration,
        CompanyService $companyService,
        TenantPlanHistoryService $tenantPlanHistoryService,
        CompanyLocation $companyLocation,
        SupplierMyAccountService $supplierMyAccountService
    ) {
        $this->hirerRegistration = $hirerRegistration;
        $this->supplierRegistration = $supplierRegistration;
        $this->companyService = $companyService;
        $this->tenantPlanHistoryService = $tenantPlanHistoryService;
        $this->companyLocation = $companyLocation;
        $this->supplierMyAccountService = $supplierMyAccountService;
    }

    public function showMyAccount()
    {

        //supplier my account start
        $userId = Auth::user()->id;
        $company_id = $this->supplierRegistration->companyIdByTenant(tenant());
        $locations = $this->supplierRegistration->locationsOfSupplier($company_id);


        $userSettings = $this->supplierMyAccountService->getUserSettings($userId);
        $companySettings = $this->supplierMyAccountService->getCompanySettings($company_id);

        //supplier my account end


        $states = $this->supplierRegistration->states();
        $regions = $this->supplierRegistration->regions();

        $tenantPlanHistory = $this->tenantPlanHistoryService->getTenantPlanHistoryService(tenant())->get();

        $list[] = array();

        foreach($tenantPlanHistory as $tenantPl){
            $description = json_decode($tenantPl->description, true);
            $list['subscription_package'] = $description['subscription_category']['name'];
            $list['start_date'] = $description['start_date'];
            $list['end_date'] = $description['end_date'];
            $list['total'] = $description['total'];
            foreach($description['subscription_components'] as $componentKey => $componentValue){
                $list[$componentValue['name']] = $componentValue['pivot']['quantity'];
            }
        }

        $companyLocationsWithcompanyLocationRegion = $this->supplierRegistration->companyLocationsWithcompanyLocationRegion(tenant());

        $locationRegion = array();

        foreach($companyLocationsWithcompanyLocationRegion as $companyLocationRegion){
            foreach($companyLocationRegion->companyLocationRegion as $locRegion){
                $locationRegion[] = $locRegion->region_id;
            }
        }


        //get the company region name with location id to display regions start //
        $locationRe = array();
        $locationReg =  $this->companyLocation->where("company_id", $company_id)->with('companyLocationRegion')->get();




        foreach($locationReg as $reg){
            foreach($reg->companyLocationRegion as $region){
                $locationRe[$reg->id][] = $region->region_id;
            }
        }


        $locIdWithRegionName = array();

        foreach($locationRe as $key => $val){

            $val = array_slice($val, 0, 2);

            foreach($regions as $reg){
                foreach($val as $k => $v){
                    if($reg->id == $v){
                        $locIdWithRegionName[$key][$reg->id] = $reg->name;
                    }
                }
            }
        }


        //get the company region name with location id to display regions end //


        return view('SupplierMyAccount.supplier-my-account')
            ->with(compact('locations', 'states','regions','list','locationRegion', 'locIdWithRegionName', 'userSettings', 'companySettings'));
    }
    

    public function showEditMyAccount(){
        $userId = Auth::user()->id;
        $company_id = $this->supplierRegistration->companyIdByTenant(tenant());

        $states = $this->supplierRegistration->states();
        $regions = $this->supplierRegistration->regions();
        $userSettings = $this->supplierMyAccountService->getUserSettings($userId);
        $companySettings = $this->supplierMyAccountService->getCompanySettings($company_id);
        $companyLocations = $this->supplierMyAccountService->companyLocationsWithcompanyLocationRegion($company_id);

        return view('SupplierMyAccount.edit-supplier-my-account')->with(compact('userSettings', 'companySettings', 'companyLocations','regions','states'));
    }


    public function editMyAccount(SupplierMyAccountRequest $request){
        $userId = Auth::user()->id;
        $this->supplierMyAccountService->updateUserSettings($userId, $request);
        session()->flash('alert-success', 'Successfully updated!.');
        return 'true';
    }
}