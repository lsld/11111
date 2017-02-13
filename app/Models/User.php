<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use System\Notifications\EmailConfirmation;
use Illuminate\Database\Eloquent\Model;
use App\Models\States;
use App\Models\Company;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'phone',
        'password',
        'avatar',
        "role_id",
        "status",
        "admin_states_ids",
        "admin_user_role"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getTenantPlanAttribute(){
        $tenant = null;
        $tenants = $this->tenant;

        if (isset($tenants[0])) {
            $tenant = $tenants[0];
        }

        if($tenant){
            return $tenantPlan = $tenant->tenantPlan->plan;
        }
        return;
    }

    public function getCompaniesAttribute(){
        /* get company details with locations and profile */

        $tenant = null;
        $tenants = $this->tenant;

        if (isset($tenants[0])) {
            $tenant = $tenants[0];
        }

        if($tenant){
            $company = $tenant->company;
            if(isset($company[0])){
                return $company[0];
            }
        }
        return;
    }

    public function tenant()
    {
        // Important: Although user belongs to one tenant we have to move that to pivot table ,
        // Because some users aren't belongs any tenant
        return $this->belongsToMany(Tenant::class);
    }

    public function getLastLoginTimeAttribute(){

        $loginLog = $this->loginLog;
        if($loginLog->count()){
            $last_data_object = collect($loginLog)->last();
            return date('d F Y h:i A', strtotime($last_data_object->log_time));
            return $last_data_object->log_time;
        }
        return '--';
    }

    public function getAdminStatesListAttribute(){

        $admin_states_ids = $this->admin_states_ids;
        return unserialize($admin_states_ids);

    }

    public function getTenantIdAttribute()
    {
        $tenant = null;
        $tenants = $this->tenant;

        if (isset($tenants[0])) {
            $tenant = $tenants[0]->id;
        }
        return $tenant;
    }

    public function actAs($slug)
    {
        return $this->role_id == Role::bySlug($slug)->id;
    }

    public function sendActivationLink()
    {
        $userActivation = new UserActivation();
        $this->notify(new EmailConfirmation(
            $userActivation->createActivation($this)
        ));
    }

    public function jobRequests()
    {
        return $this->hasMany(JobRequests::class, 'id');
    }

    public function loginLog(){
        return $this->hasMany(UserLoginLog::class, 'user_id');
    }
    
}
