<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TenantsServiceSettingsCategoryStReg extends Model
{
    protected $table = 'tenants_service_settings_st_reg';

    protected $fillable = ['ser_sett_id', 'states_id', 'regions_id'];
}
