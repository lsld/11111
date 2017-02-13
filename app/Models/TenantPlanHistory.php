<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class TenantPlanHistory extends  Model
{
    public $table = "tenant_plan_history";

    protected $fillable = ['description', 'tenant_id', 'plan_id'];
}