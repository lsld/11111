<?php

namespace Services;


use App\Constants\TenantType;
use App\Constants\UserRole;
use App\Models\CompanyProfile;
use Services\Company\CompanyService;
use System\Events\HirerHasRegistered;

class HirerRegistrationService
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
    /**
     * @var CompanyProfile
     */
    private $companyProfile;

    public function __construct(
        TenantService $tenantService,
        UserService $userService,
        CompanyService $companyService,
        ContactService $contactService
    )
    {

        $this->tenantService = $tenantService;
        $this->userService = $userService;
        $this->companyService = $companyService;
        $this->contactService = $contactService;
    }

    public function register($attributes)
    {
        //try {
            $tenant = $this->tenantService->create($attributes, TenantType::HIRER);
            $user = $this->userService->create($attributes, UserRole::HIRER);
            $this->userService->addUserToTenant($user, $tenant);
            $company = $this->companyService->create($attributes, $tenant);
            $this->companyService->createProfile(
                    $this->companyProfileAttributes($attributes), $company->id);

            $this->companyService->addLocationToCompany($attributes, $company->id);
            $user->sendActivationLink();

            event(new HirerHasRegistered($tenant));
            return true;
       // } catch (\Exception $e) {
      //      return false;
     //   }
    }


    private function companyProfileAttributes($attributes)
    {
        return [
            "company_profile" => $attributes["company_name"],
            "phone1" => __get($attributes, "phone"),
        ];
    }
}