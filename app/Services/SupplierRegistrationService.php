<?php

namespace Services;

use App\Constants\LocationType;
use App\Constants\TenantType;
use App\Constants\UserRole;
use App\Models\Company;
use App\Models\Role;
use App\Models\Region;
use App\Models\States;
use App\Models\Tenant;
use Services\Company\CompanyService;


class SupplierRegistrationService
{
    /**
     * @var TenantService
     */
    private $tenantService;
    /**
     * @var UserService
     */
    private $userService;
    /**
     * @var CompanyService
     */
    private $companyService;

    /**
     * @var ContactService
     */
    private $contactService;

    private $role;


    private $supplierPlantService;
    private $supplierContractService;
    private $supplierMaterialService;
    private $supplierFillService;

    public function __construct(
        TenantService $tenantService,
        UserService $userService,
        CompanyService $companyService,
        ContactService $contactService,


        SupplierPlantService $supplierPlantService,
        SupplierContractService $supplierContractService,
        SupplierMaterialService $supplierMaterialService,
        SupplierFillService $supplierFillService,

        Role $role
    ) {

        $this->tenantService = $tenantService;
        $this->userService = $userService;
        $this->companyService = $companyService;
        $this->contactService = $contactService;

        $this->supplierPlantService = $supplierPlantService;
        $this->supplierContractService = $supplierContractService;
        $this->supplierMaterialService = $supplierMaterialService;
        $this->supplierFillService = $supplierFillService;

        $this->role = $role;
    }

    public function account($attributes)
    {

        $tenant = $this->tenantService->create($attributes, TenantType::SUPPLIER);
        $user = $this->userService->create($attributes, UserRole::SUPPLIER);
        
        $this->userService->addUserToTenant($user, $tenant);
        $company = $this->companyService->create($attributes, $tenant);
        return compact('company', 'tenant');
    }

    public function companyProfile($attributes, $company_id)
    {///dd($attributes);
        $profile = $this->companyService->createProfile($attributes, $company_id);
        return $profile;
    }

    public function addLocation($attributes, $company_id)
    {
        $this->companyService->addLocationToCompany($attributes, $company_id, LocationType::BRANCH,
            $attributes['name']);
    }

    public function updateLocation($attributes, $company_id)
    {

        $this->companyService->updateLocationToCompany($attributes, $company_id, LocationType::BRANCH,
            $attributes['name']);
    }


    public function locationsOfSupplier($company_id)
    {
        return $this->companyService
            ->locationsBy($company_id);
    }



    public function companyLocations($companyId)
    {
        $list = [];

        $company = $this->companyService->companyLocations($companyId);


        if (!empty($locations = $company->locations->unique('regions_id'))) {
            $locations->each(function ($item) use (&$list) {
                $list[$item->states_id][] = $item->regions_id;
            });
        }

        return $list;
    }

    public function statesWithRegions($companyId)
    {
        $list = $this->companyService->statesWithRegions($companyId);
        return $list;
    }

    public function locationsStatesRegions($company_id)
    {
        return $this->companyService
            ->locationsStatesRegions($company_id);
    }

    public function fillCategory($tenantId)
    {
        return Fill::select('fill_type_id')->where('tenant_id', $tenantId)->groupBy('fill_type_id')->get();
    }

    public function regionsBystates($company_id)
    {
        $locations = $this->companyService->locationsBy($company_id);
    }

    public function regionsByStatesId($company_id, $states_id)
    {
        return $this->companyService
            ->regionsByStatesId($company_id, $states_id);
    }


    public function sendActivationLink($tenant_id)
    {
        $users = $this->userService->byTenant($tenant_id);
        $user = $users->first();
        try {
            $user->sendActivationLink();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }


    //services
    public function addService($attributes)
    {
        $type = $attributes['_type'];
        //unset($attributes['_type']);

        switch ($type) {

            case "plant" :
                $attributes['_type'] = 1;
                return $this->supplierPlantService->addService($attributes);
                break;

            case "contracting" :
                $attributes['_type'] = 2;
                return $this->supplierContractService->addService($attributes);
                break;

            case "material" :
                $attributes['_type'] = 3;
                return $this->supplierMaterialService->addService($attributes);
                break;

            case "fill" :
                $attributes['_type'] = 4;
                return $this->supplierFillService->addService($attributes);
                break;
        }
    }

    public function companyIdByTenant($id)
    {
        $company = Company::where('tenant_id', $id)->first();
        return $company->id;
    }

    public function states()
    {
        return States::all();
    }


    public function regions()
    {
        return Region::all();
    }

    public function setFlagStatus($id, $flag = null){

        if($flag){
            $tenant = Tenant::find($id);
            $tenant->$flag = 1;
            $tenant->save();
        }
    }


    public function notificationsFlag($id)
    {
        $tenant = Tenant::find($id);
        $tenant->notifications_inserted = 1;
        $tenant->save();
    }


    public function companyLocationsWithcompanyLocationRegion($id){
        $location = $this->companyService->companyLocationsWithcompanyLocationRegion($id);
        return $location;
    }

    public function getTenantType($slug){
        $type = $this->role->where('slug', $slug)->first();
        return $type->id;
    }

}