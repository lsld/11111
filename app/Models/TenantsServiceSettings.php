<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Contracting;
use App\Models\Fill;
use App\Models\Material;
use App\Models\PlantHire;

class TenantsServiceSettings extends Model
{
    protected $table = 'tenants_service_settings';

    protected $fillable = [
        'job_type_id',
        'service_title',
        'tenant_id',
        'supp_serv_ids',
        'states_ids',
        'regions_ids'
    ];

    public function getRegionsIdsListAttribute(){

        return  unserialize($this->regions_ids);
    }

    public function getStatesIdsListAttribute(){

        return  unserialize($this->states_ids);
    }

    public function getAllSupplierServicesAttribute(){
        /*
         * return :- list of supplier added all services
         */
        switch ($this->job_type_id){
            case 1:
                return PlantHire::where('tenant_id', $this->tenant_id)->with('mainCategory')->get();
                break;
            case 2:
                return Contracting::where('tenant_id', $this->tenant_id)->with('mainCategory')->get();
                break;
            case 3:
                return Material::where('tenant_id', $this->tenant_id)->with('mainCategory')->get();
                break;
            case 4:
                return Fill::where('tenant_id', $this->tenant_id)->with('mainCategory')->get();
                break;
        }
        return null;
    }

    public function getSuppServIdsListAttribute(){

        return unserialize($this->supp_serv_ids);
    }

    public function settingsCategories()
    {
        return $this->hasMany(TenantsServiceSettingsCategory::class, 'ser_sett_id');
    }

    public function tenantsServiceSettingsCategoryStReg()
    {
        return $this->hasMany(TenantsServiceSettingsCategoryStReg::class, 'ser_sett_id');
    }
}
