<?php

namespace Services;


use App\Events\AddingMaterial;
use App\Events\RemovingMaterial;
use App\Models\Material;
use App\Models\MaterialType;
use App\Models\ResourceType;
use App\Models\ItemCategories;
use System\RulesEngine\Constants\Components;
use System\RulesEngine\Facades\Rule;
use App\Models\Company;
use Services\SupplierRegistrationService;


class SupplierMaterialService
{
    private $material;
    private $supplierRegistration;

    public function __construct(Material $material)
    {
        $this->material = $material;
    }

    public function addService($data)
    {
        return $this->addMaterial($data);
    }

    public function addMaterial($data)
    {
        $job_type = $data['_type'];

        $tenant_id = $data['tenant_id'];

        if(!(Rule::validate(Components::MATERIAL, $tenant_id))){

           // session()->flash('alert-danger', 'Number of Insertions Exceeded.');

           // return redirect()->route('show_supplier_services');
            return false;
        }

        $tenant_id = $data['tenant_id'];

        $resourcetype = $data['resourcetype'];

        $quality = $data['quality'];

        $company = Company::where('tenant_id', $tenant_id)->first();
        $companyId = $company->id;

        $material = $this->material->create(
            [
                'main_category' => $resourcetype,

                'quality' => $quality,

                'tenant_id' => $tenant_id,

                'job_type' => $job_type,

                'company_id' => $companyId
            ]
        );

        event(new AddingMaterial($material));
        return $material;
    }

    public function resourceTypes()
    {
        return MaterialType::all()->toArray();
    }


    public function materialTableData($tenantId)
    {
        return Material::where('tenant_id', $tenantId)->with(['ResourceType'])->get();
    }

    public function materialCategory($tenantId){
        return Material::select('resource_type_id')->where('tenant_id', $tenantId)->groupBy('resource_type_id')->get();
    }

    public function deleteMaterial($id){
        $material = Material::find($id);
        $material->delete();
        event(new RemovingMaterial($material));
    }

    public function materialData($id)
    {
        return Material::where('id', $id)->with(['ResourceType'])->first();
    }

    public function editMaterialService($data){
        $id = $data['id'];
        $material = Material::find($id);
        $material->main_category = $data['resourcetype'];
        $material->quality = $data['quality'];
        $material->save();
    }

    public function materialList($tenantId){

        $resourceTypes = $this->resourceTypes();

        $materialTableData = $this->materialTableData($tenantId);

        $materialList = array();
        foreach($resourceTypes as $resourceType){
            foreach($materialTableData as $material){
                if($material->main_category == $resourceType['id']){
                    //$materialList['job_type'] = $material->job_type;
                    $materialList[$material->job_type]['main_category'][$material->main_category] = $resourceType['name'];
                }
            }
        }

        return $materialList;
    }
}