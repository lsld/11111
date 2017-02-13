<?php
namespace Web\Controllers\Auth;
namespace Web\Controllers;
use Services\Company\CompanyService;
use Services\SupplierMyAccountService;
use Services\HirerRegistrationService;
use Services\SupplierRegistrationService;
use Services\Company\CompanyLocationService;
use Services\TenantPlanHistoryService;
use Web\Requests\SupplierSingUpLocationRequest;
use App\Models\Region;
use App\Models\CompanyLocation;
class SupplierLocationController extends Controller
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

    private $companyLocationService;

    private $region;

    public function __construct(
        HirerRegistrationService $hirerRegistration,
        SupplierRegistrationService $supplierRegistration,
        CompanyService $companyService,
        TenantPlanHistoryService $tenantPlanHistoryService,
        CompanyLocation $companyLocation,
        SupplierMyAccountService $supplierMyAccountService,
        CompanyLocationService $companyLocationService,
        Region $region
    ) {
        $this->hirerRegistration = $hirerRegistration;
        $this->supplierRegistration = $supplierRegistration;
        $this->companyService = $companyService;
        $this->tenantPlanHistoryService = $tenantPlanHistoryService;
        $this->companyLocation = $companyLocation;
        $this->supplierMyAccountService = $supplierMyAccountService;
        $this->companyLocationService = $companyLocationService;
        $this->region = $region;
    }

    public function showLocation()
    {
        $location_list= $this->companyLocationService->locationList(tenant());
        return view('SupplierLocation.supplier-location')
            ->with(compact('location_list'));
    }

    public function supplierLocations(SupplierSingUpLocationRequest $request)
    {
        $company_id = $this->supplierRegistration->companyIdByTenant(tenant());
        $this->supplierRegistration->addLocation(
            $request->all(),
            $company_id
        );
        session()->flash('alert-success', 'Location successfully added.');
        return 'true';
    }

    public function showSupplierLocationsById($id){
        $location = $this->companyService->locationById($id);
        $companyLocationsWithcompanyLocationRegion = $this->supplierRegistration->companyLocationsWithcompanyLocationRegion($id);
        $locationRegion = array();
        foreach($companyLocationsWithcompanyLocationRegion as $companyLocationRegion){
            foreach($companyLocationRegion->companyLocationRegion as $locRegion){
                $locationRegion[] = $locRegion->region_id;
            }
        }
        return view('SupplierLocation.view-supplier-location')->with(compact('location','locationRegion'));
    }

    public function showEditLocations($id){
        $locationRegion = $this->supplierRegistration->companyLocationsWithcompanyLocationRegion($id)->first();
        $relatedRegions = $this->region->where('states_id', $locationRegion->states_id)->get();
        $companyLocationsWithcompanyLocationRegion = $this->supplierRegistration->companyLocationsWithcompanyLocationRegion($id);

        /* all selected */
        //$regionsCountDB = Region::where('states_id', $locationRegion->states_id)->count();
        $regionsCountDB = $relatedRegions->count();
        $regionsCountUser= $locationRegion->companyLocationRegion->count();
        $allRegionsselected = false;

        if($regionsCountUser == $regionsCountDB){
            $allRegionsselected = true;
        }


        $selectedRegions = array();
        foreach($companyLocationsWithcompanyLocationRegion as $companyLocationRegion){
            foreach($companyLocationRegion->companyLocationRegion as $locRegion){
                $selectedRegions[] = $locRegion->region_id;
            }
        }

        return view('SupplierLocation.edit-supplier-location')->with(compact('locationRegion', 'selectedRegions', 'allRegionsselected', 'relatedRegions'));
    }

    public function editLocations(SupplierSingUpLocationRequest $request){
        $company_id = $this->supplierRegistration->companyIdByTenant(tenant());
        $this->supplierRegistration->updateLocation(
            $request->all(),
            $company_id
        );

        session()->flash('alert-success', 'Location successfully updated.');
        return 'true';
    }

    public function deleteLocations($id){
        $this->companyService->deleteLocation($id);
        session()->flash('alert-success', 'Location successfully deleted.');
        return redirect()->back();
    }
}