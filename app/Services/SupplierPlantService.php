<?php
/**
 * Created by PhpStorm.
 * User: lasath
 * Date: 11/28/16
 * Time: 4:35 PM
 */

namespace Services;
use App\Events\AddingMachines;
use App\Events\RemovingMachines;
use App\Models\Accessories;
use App\Models\HireType;
use App\Models\Company;
use App\Models\ItemCategories;
use App\Models\PlantHire;
use App\Models\PlantHire\PlantHireProperty;
use System\RulesEngine\Constants\Components;
use System\RulesEngine\Facades\Rule;
use Services\HirerRegistrationService;
use Services\SupplierRegistrationService;



class SupplierPlantService
{
    private $plantHire;

    private $supplierPlantService;

    private $supplierRegistration;

    public function __construct(PlantHire $plantHire)
    {
        $this->plantHire = $plantHire;
    }


    public function addService($data)
    {
        return $this->addPlant($data);
    }

    public function addPlant($data)
    {
        $tenant_id = $data['tenant_id'];

        //TODO@Lakitha validate with rules engine and return the message
        if(!(Rule::validate(Components::MACHINES, $tenant_id))){

           // session()->flash('alert-danger', 'Number of Insertions Exceeded.');

            //return redirect()->route('show_supplier_services');
            return false;
        }

            $job_type = $data['_type'];

            $desc = $data['desc'];

            $quantity = $data['quantity'];

            $item_category_id = $data['itemtype'];

            $hire_type_id = $data['hiretype'];

            $company = Company::where('tenant_id', $tenant_id)->first();
            $companyId = $company->id;

            //$accessory_id = $data['accessories'];

            $plant = $this->plantHire->create(
                [
                    'description' => $desc,
                    'quantity' => $quantity,
                    'tenant_id' => $tenant_id,
                    'main_category' => $item_category_id,
                    'hire_type_id' => $hire_type_id,
                   // 'accessory_id' => $accessory_id,
                    'job_type' => $job_type,
                    'company_id' => $companyId
                ]
            );

            event(new AddingMachines($plant));
            return $plant;
    }


    public function itemTypes(){
        return PlantHireProperty::all()->toArray();
    }

    public function hireTypes()
    {
        return HireType::all()->toArray();
    }


    public function accessories()
    {
        return Accessories::all()->toArray();
    }

    public function plantHireTableData($tenantId)
    {
        return PlantHire::where('tenant_id', $tenantId)->with([ 'HireType', 'Accessory'])->get();
    }

    public function plantHireCategory($tenantId)
    {
        return PlantHire::select('item_category_id')->where('tenant_id', $tenantId)->groupBy('item_category_id')->get();
    }

    public function deletePlant($id){
        $plantHire = PlantHire::find($id);
        $plantHire->delete();
        event(new RemovingMachines($plantHire));
    }

    public function plantHireData($id)
    {
        return PlantHire::where('id', $id)->with(['ItemCategory', 'HireType', 'Accessory'])->first();
    }

    public function editPlantService($data){
        $id = $data['id'];
        $plantHire = PlantHire::find($id);

        $plantHire->main_category = $data['itemtype'];
        $plantHire->hire_type_id = $data['hiretype'];;
        $plantHire->description = $data['desc'];
        $plantHire->quantity = $data['quantity'];

        $plantHire->save();
    }

    public function plantHireList($tenantId){

        $itemTypes = $this->itemTypes();

        $plantHireTableData =  $this->plantHireTableData($tenantId);

        $plantHireList = array();
        foreach($itemTypes as $itemType){
            foreach($plantHireTableData as $plantHire){
                if($plantHire->main_category == $itemType['id']){
                    $plantHireList[$plantHire->job_type]['main_category'][$plantHire->main_category] = $itemType['label'];
                }
            }
        }

        return $plantHireList;
    }
}