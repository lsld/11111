<?php
namespace  Services\HirerPortal;
namespace Web\Controllers\HirerPortal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Services\HirerPortal\HirerMyAccountService;
use Services\SupplierRegistrationService;
use Web\Requests\HirerMyAccountRequest;
use App\Models\Region;


class HirerMyAccountController
{
    private $hirerMyAccountService;
    private $supplierRegistrationService;

    public function __construct(HirerMyAccountService $hirerMyAccountService, SupplierRegistrationService $supplierRegistrationService)
    {
        $this->hirerMyAccountService = $hirerMyAccountService;
        $this->supplierRegistrationService = $supplierRegistrationService;
    }

    public function  showMyAccount(){
        $userId = Auth::user()->id;
        $company_id = $this->supplierRegistrationService->companyIdByTenant(tenant());

        $userSettings = $this->hirerMyAccountService->getUserSettings($userId);
        $companySettings = $this->hirerMyAccountService->getCompanySettings($company_id);

        return view('HirerMyAccount.hirer-my-account')->with(compact('userSettings', 'companySettings'));
    }

    public function showEditMyAccount(){
        $userId = Auth::user()->id;
        $company_id = $this->supplierRegistrationService->companyIdByTenant(tenant());

        $states = $this->supplierRegistrationService->states();
        $regions = $this->supplierRegistrationService->regions();
        $userSettings = $this->hirerMyAccountService->getUserSettings($userId);
        $companySettings = $this->hirerMyAccountService->getCompanySettings($company_id);
        $companyLocations = $this->hirerMyAccountService->companyLocationsWithcompanyLocationRegion($company_id);


        return view('HirerMyAccount.edit-hirer-my-account')->with(compact('userSettings', 'companySettings', 'companyLocations','regions','states'));
    }

    public function editMyAccount(HirerMyAccountRequest $request){
        $userId = Auth::user()->id;
        $company_id = $this->supplierRegistrationService->companyIdByTenant(tenant());

        $this->hirerMyAccountService->updateUserSettings($userId, $request);
        $this->hirerMyAccountService->updateCompanyLocation($request,$company_id);
        session()->flash('alert-success', 'Successfully updated!.');
        return 'true';
    }

    public function getRegionsByStateIdSelected($id){

        $company_id = $this->supplierRegistrationService->companyIdByTenant(tenant());
        $companyLocations = $this->hirerMyAccountService->companyLocationsWithcompanyLocationRegion($company_id);



        $regions = Region::where('states_id',$id)->get();
        $str = "";

        if($regions)
        {
            foreach($regions as $region)
            {
                foreach($companyLocations->companyLocationRegion as $companyRegion)
                {
                    if ($companyRegion->region_id == $region->id)
                    {
                        $str .= '<option class="region_list_options region_list_option_state_.$region->states_id." value="' . $region->id . '" selected>' . $region->name . '</option>';

                    }
                }
            }
        }
        else
        {
            $str .= '<option class="." >"."</option>';
        }

        return $str;
    }

    public function getRegionsByStateIdLoad($id){
        $company_id = $this->supplierRegistrationService->companyIdByTenant(tenant());
        $companyLocations = $this->hirerMyAccountService->companyLocationsWithcompanyLocationRegion($company_id);



        $regions = Region::where('states_id',$id)->get();
        $str = "";

        if($regions)
        {
            foreach($regions as $region)
            {

                        $str .= '<option class="region_list_options region_list_option_state_.$region->states_id." value="' . $region->id . '">' . $region->name . '</option>';
            }
        }
        else
        {
            $str .= '<option class="." >"."</option>';
        }

        return $str;
    }
}