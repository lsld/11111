<?php
namespace Services;
use App\Models\JobTypes;
use App\Models\TenantsServiceSettings;
use Services\Company\CompanyLocationService;

class SupplierNotificationService
{

    protected $tenantsServiceSettings;
    protected $companyLocationService;
    protected $jobTypes;

    public function __construct(
                    TenantsServiceSettings $tenantsServiceSettings,
                    CompanyLocationService $companyLocationService,
                    JobTypes $jobTypes
    )
    {
        $this->tenantsServiceSettings = $tenantsServiceSettings;
        $this->companyLocationService = $companyLocationService;
        $this->jobTypes               = $jobTypes;
    }

    public function updateSupplierNotifications($tenant_id, $data){

        $this->tenantsServiceSettings->where('tenant_id', $tenant_id)->delete();

        foreach ($data as $settings){
            if($settings){

                $supp_serv_ids = null;
                if(isset($settings['supp_serv_ids'])){
                    $supp_serv_ids = serialize($settings['supp_serv_ids']);
                }

                $states_ids = null;
                if(isset($settings['states_ids'])){
                    $states_ids = serialize($settings['states_ids']);
                }

                $regions_ids = null;
                if(isset($settings['regions_ids'])){
                    $regions_ids = serialize($settings['regions_ids']);
                }

                    if(!empty($supp_serv_ids) and !empty($states_ids) and !empty($regions_ids)) {
                            $this->tenantsServiceSettings->insert([
                                'job_type_id' => $settings['job_type_id'],
                                'service_title' => $settings['service_title'],
                                'tenant_id' => $tenant_id,
                                'supp_serv_ids' => $supp_serv_ids,
                                'states_ids' => $states_ids,
                                'regions_ids' => $regions_ids,
                            ]);

                    }
            }
        }
        return;
    }

    public function getNotificationSettings($tenant_id){

        return $this->tenantsServiceSettings->orderBy('job_type_id')->where('tenant_id', $tenant_id)->get();

    }

}