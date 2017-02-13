<?php

namespace Services\HirerPortal;
use Services\UserService;
use Services\Company\CompanyService;
class HirerMyAccountService
{
    private $userService;
    private $companyService;

    public function __construct(UserService $userService, CompanyService $companyService){
        $this->userService = $userService;
        $this->companyService = $companyService;
    }

    public function getUserSettings($id){
        return  $this->userService->getUserSettings($id);
    }

    public function getCompanySettings($tenantId){
        return $this->companyService->getCompanySettings($tenantId);
    }

    public function updateUserSettings($id, $request){
        $this->userService->updateUserSettings($id, $request);
    }

    public function updateCompanySettings($id, $request){
        $this->companyService->updateCompanySettings($id, $request);
    }

    public function updateCompanyLocation($request,$company_id)
    {
        $this->companyService->updateLocationCompany($request,$company_id);
    }

    public function companyLocationsWithcompanyLocationRegion($id)
    {
        return $this->companyService->companyLocationsWithcompanyLocationReg($id);
    }
}