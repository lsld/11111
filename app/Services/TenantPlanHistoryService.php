<?php
/**
 * Created by PhpStorm.
 * User: lasath
 * Date: 12/27/16
 * Time: 9:38 AM
 */

namespace Services;
use App\Models\TenantPlanHistory;

class TenantPlanHistoryService
{
    private $tenantPlanHistory;

    public function __construct(TenantPlanHistory $tenantPlanHistory)
    {
        $this->tenantPlanHistory = $tenantPlanHistory;
    }

    public function getTenantPlanHistoryService($id){
        return TenantPlanHistory::where('tenant_id', $id);
    }
}