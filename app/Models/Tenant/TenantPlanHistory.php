<?php

namespace App\Models\Tenant;

use App\Models\Plan;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Model;

class TenantPlanHistory extends Model
{
    protected $table = 'tenant_plan_history';

    protected $fillable = ['description', 'tenant_id', 'plan_id'];

    /* Relations */

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    /* End of  Relations */
}