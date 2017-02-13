<?php

namespace Services\Matching;

use App\Constants\JobRequestStatus;
use App\Constants\QuoteStatus;
use App\Constants\UserStatus;
use App\Models\FillType;
use App\Models\JobRequests;
use App\Models\JobTypes;
use App\Models\MaterialType;
use App\Models\PlantHire\PlantHireProperty;
use App\Models\Quotes;
use App\Models\Service\ServiceProperty;
use App\Models\SupplierNotificationEmailLog;
use App\Models\TenantsServiceSettings;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use Mockery\Exception;
use System\Mail\JobNotification;

class MatchingService
{
    use Notifiable;

    protected $jobTypes;
    protected $jobRequests;
    protected $user;
    protected $tenantsServiceSettings;
    protected $supplierNotificationEmailLog;
    protected $plantHireProperties;
    protected $serviceProperty;
    protected $materialType;
    protected $fillType;
    protected $quotes;

    private $tenantsNotificationSettings = null;
    private $getPendingJobsList = null;
    private $matchedJobList = null;
    private $matchedJobIdsArray = null;

    public function __construct(
        JobTypes $jobTypes,
        JobRequests $jobRequests,
        User $user,
        TenantsServiceSettings $tenantsServiceSettings,
        SupplierNotificationEmailLog $supplierNotificationEmailLog,
        PlantHireProperty $plantHireProperties,
        ServiceProperty $serviceProperty,
        MaterialType $materialType,
        FillType $fillType,
        Quotes $quotes
    ) {

        $this->jobTypes = $jobTypes;
        $this->jobRequests = $jobRequests;
        $this->user = $user;

        $this->plantHireProperties = $plantHireProperties;
        $this->serviceProperty = $serviceProperty;
        $this->materialType = $materialType;
        $this->fillType = $fillType;

        $this->tenantsServiceSettings = $tenantsServiceSettings;
        $this->supplierNotificationEmailLog = $supplierNotificationEmailLog;

        $this->getPendingJobsList = $this->getPendingJobsList();
    }

    public function sendNotificationsToSupplier($job_id)
    {

        $jobs = $this->getPendingJobsList();
        $job = $jobs->find($job_id);

        if ($job) {
            $this->getPendingJobsList = $jobs->whereIn('id', [$job_id]);

            $this->generateNotifications();
        }
    }

    public function generateNotifications()
    {

        try {
            $users = $this->user->where(['status' => UserStatus::ACTIVATED])
                ->whereIn('role_id', [3, 4])
                ->with(['tenant'])->get();
            $supplier_list = $users->where('role_id', 3);
            $hirer_list = $users->where('role_id', 4);
            $list = array();

            foreach ($supplier_list as $itens) {

                $list[] = $tenant_id = $itens->tenant_id;
                $matchedJobList = $this->matchUnQuotedJobsAndNotifications($tenant_id); /* get matched jobs with supplier */

                $user_id = $itens->id;
                if ($matchedJobList->count()) {
                    foreach ($matchedJobList as $job) {
                        if ($this->checkNotificationRecords($tenant_id, $user_id, $job)) {

                            $this->updateNotificationSendRecord($tenant_id, $user_id,
                                $job); /* update notification records */

                            $property_label = $this->generatePropertyLabel($job);
                            $mail_data = [
                                'job' => $job,
                                'supplier' => $itens,
                                'hirer' => $hirer_list->find($job->user_id),
                                'job_type' => $this->jobTypes->find($job->job_type_id),
                                'property_label' => $property_label,
                            ];
                            /////////////////////////////////////////////////
                            Mail::to($itens)->send(new JobNotification($mail_data));

                        }
                    }
                }
            }
        } catch (Exception $e) {
        }

        return;
    }

    public function checkNotificationRecords($tenant_id, $user_id, $job)
    {
        //TODO cache update
        $get_notify = $this->supplierNotificationEmailLog->where('tenant_id', $tenant_id)
            ->where('user_id', $user_id)
            ->where('Job_id', $job->id)
            ->where('update_time', $job->created_at)
            ->first();

        if (is_null($get_notify)) {
            /*  record not exist */
            return true;
        } else {
            return false;
        }
    }

    public function updateNotificationSendRecord($tenant_id, $user_id, $job)
    {

        //TODO cache update
        return $this->supplierNotificationEmailLog->create([
            'tenant_id' => $tenant_id,
            'user_id' => $user_id,
            'Job_id' => $job->id,
            'update_time' => $job->created_at
        ]);
    }

    public function matchUnQuotedJobsAndNotifications($tenant_id)
    {

        $this->matchJobsAndNotifications($tenant_id);

        $own_unquoted_list = array();
        foreach ($this->matchedJobList as $job) {
            $tenants_id_list = $job->quotes->pluck('tenant_id')->toArray();

            if (!in_array($tenant_id, $tenants_id_list)) {
                $own_unquoted_list[] = $job->id;
            }

        }

        $this->matchedJobList = $this->matchedJobList->whereIn('id', $own_unquoted_list);

        return $this->matchedJobList;
    }

    public function matchJobsAndNotifications($tenant_id)
    {

        $this->loadTenantNotificationSettings($tenant_id);
        $this->getPendingJobsList();

        $matched_jobs_all = $matched_job_list = array();

        if ($this->tenantsNotificationSettings->isNotEmpty() && $this->getPendingJobsList->isNotEmpty()) {
            /* tenant settings and pending jobs are ready to match */

            $filtered_job_list_first = $this->getPendingJobsList;
            $filtered_job_list_first = $filtered_job_list_first->where('tenant_id', '<>', $tenant_id);
            /*  remove own Jobs */

            foreach ($this->tenantsNotificationSettings as $tenants_services) {
                /*  loop with tenants provides jobs types */

                $job_type_id = $tenants_services->job_type_id;

                $filtered_job_list = $filtered_job_list_first;
                $filtered_job_list = $filtered_job_list->where('job_type_id', $job_type_id); /* filter :- job type*/
                $filtered_job_list = $this->filterWithStatesAndRegions(
                    $filtered_job_list,
                    $tenants_services->states_ids,
                    $tenants_services->regions_ids
                );

                switch ($job_type_id) {

                    case 1:
                        $matched_job_list[1] = $this->matchPlantHireJobs(
                            $filtered_job_list,
                            $tenants_services->supp_serv_ids
                        );
                        $matched_jobs_all = array_merge($matched_jobs_all, $matched_job_list[1]);
                        break;
                    case 2:
                        $matched_job_list[2] = $this->matchConstructingJobs(
                            $filtered_job_list,
                            $tenants_services->supp_serv_ids
                        );
                        $matched_jobs_all = array_merge($matched_jobs_all, $matched_job_list[2]);
                        break;
                    case 3:
                        $matched_job_list[3] = $this->matchMaterialJobs(
                            $filtered_job_list,
                            $tenants_services->supp_serv_ids
                        );
                        $matched_jobs_all = array_merge($matched_jobs_all, $matched_job_list[3]);
                        break;
                    case 4:
                        $matched_job_list[4] = $this->matchFillJobs(
                            $filtered_job_list,
                            $tenants_services->supp_serv_ids
                        );
                        $matched_jobs_all = array_merge($matched_jobs_all, $matched_job_list[4]);
                        break;

                }

            }

            $this->matchedJobList = $this->getPendingJobsList->whereIn('id', $matched_jobs_all);
            $this->matchedJobIdsArray = $matched_job_list;

            return $this->matchedJobList;
        }

        return collect([]);
    }

    public function matchFillJobs($job_list, $tenants_services)
    {
        /*  match Fill and return match ids list */
        $service_list = unserialize($tenants_services);

        $match_id_list = array();
        foreach ($job_list as $list_data) {
            $requested_fill = $list_data->fillRestData->fill_type;

            if (in_array($requested_fill, $service_list)) {
                $match_id_list[] = $list_data->id;
            }
        }

        return $match_id_list;

    }

    public function matchMaterialJobs($job_list, $tenants_services)
    {
        /*  match Material and return match id list*/

        $service_list = unserialize($tenants_services);

        $match_id_list = array();
        foreach ($job_list as $list_data) {
            $requested_material = $list_data->materialRestData->resource_type;

            if (in_array($requested_material, $service_list)) {
                $match_id_list[] = $list_data->id;
            }
        }

        return $match_id_list;
    }

    public function matchConstructingJobs($job_list, $tenants_services)
    {
        /*  match Constructing and return matched id list   */

        $service_list = unserialize($tenants_services);

        $match_id_list = array();
        foreach ($job_list as $list_data) {
            $requested_services = $list_data->itemData->pluck('properties_id');

            $match_id_ok = true;
            foreach ($requested_services as $rq_id) {
                if (!in_array($rq_id, $service_list)) {
                    $match_id_ok = false;
                }
            }
            if ($match_id_ok) {
                $match_id_list[] = $list_data->id;
            }
        }

        return $match_id_list;
    }

    public function matchPlantHireJobs($job_list, $tenants_services)
    {
        /*  match plant hire and return matched id list  */

        $service_list = unserialize($tenants_services);

        $match_id_list = array();
        foreach ($job_list as $list_data) {
            $requested_services = $list_data->itemData->pluck('properties_id');

            $match_id_ok = false;
            foreach ($requested_services as $rq_id) {
                if (in_array($rq_id, $service_list)) {
                    $match_id_ok = true;
                }
            }
            if ($match_id_ok) {
                $match_id_list[] = $list_data->id;
            }
        }

        return $match_id_list;

    }

    public function filterWithStatesAndRegions($available_jobs_to_job_type, $states_ids, $regions_ids)
    {
        $states_list = unserialize($states_ids);
        $regions_list = unserialize($regions_ids);

        return $available_jobs_to_job_type->whereIn('state_id', $states_list)
            ->whereIn('regions_id', $regions_list);

    }

    public function loadTenantNotificationSettings($tenant_id)
    {

        $this->tenantsNotificationSettings = null;
        $this->tenantsNotificationSettings = $this->tenantsServiceSettings->where('tenant_id', $tenant_id)->get();

    }

    public function getPendingJobsList()
    {

        try {

            return $this->jobRequests->orderBy('id', 'desc')
                ->where('status', JobRequestStatus::PENDING)
                ->where('expiry_date', '>=', date('Y-m-d'))
                ->with([
                    'itemData' => function ($q) {
                        return $q->with([
                            'properties' => function ($r) {
                                return $r->with([
                                    'text',
                                    'dropdown',
                                    'multiSelect',
                                    'radioButton',
                                    'checkBox'
                                ]);
                            }
                        ]);
                    },
                    'fillRestData',
                    'materialRestData',
                    'users' => function ($s) {
                        return $s->with('tenant');
                    },
                    'quotes',
                    'addressCoordinates'
                ])
                ->get();

        } catch (Exception $e) {
        }

        return null;
    }

    public function getPendingQuotes($tenantId)
    {
        $builder = Quotes::where('tenant_id', $tenantId)
            ->where('is_drafted', 0)
            ->whereDate('expiry_date', '>=', Carbon::today()->toDateString())
            ->where('status', QuoteStatus::PENDING);
        return $builder->get();
    }

    private function generatePropertyLabel($job)
    {
        $string = '';
        switch ($job->job_type_id) {
            case 1:
                $property_ids = $job->itemData->pluck('properties_id');
                foreach ($property_ids->toArray() as $id) {
                    $string .= $this->plantHireProperties->find($id)->label . ', ';
                }
                break;
            case 2:
                $property_ids = $job->itemData->pluck('properties_id');
                foreach ($property_ids->toArray() as $id) {
                    $string = $this->serviceProperty->find($id)->label;
                }
                break;
            case 3:
                $property_ids = $job->materialRestData->resource_type;
                $string = $this->materialType->find($property_ids)->name;
                break;
            case 4:
                $property_ids = $job->fillRestData->fill_type;
                $string = $this->fillType->find($property_ids)->name;
                break;
        }

        return $string;
    }

}