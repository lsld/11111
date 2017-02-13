<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TenantsServiceSettingsCategory extends Model
{
    protected $table = 'tenants_service_settings_category';

    protected $fillable = ['id', 'ser_sett_id', 'category_id'];


    public function categoryStateRegions()
    {
        return $this->hasMany(TenantsServiceSettingsCategoryStReg::class, 'ser_sett_cat_id')->withPivot(['regions_id']);
    }
}
