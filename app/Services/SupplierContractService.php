<?php
/**
 * Created by PhpStorm.
 * User: lasath
 * Date: 11/29/16
 * Time: 3:47 PM
 */

namespace Services;

use App\Events\AddingContracting;
use App\Events\AddingFill;
use App\Events\RemovingContracting;
use App\Models\WorkTypes;
use App\Models\JobTypes;
use App\Models\Contracting;
use App\Models\Company;
use App\Models\Service\ServiceProperty;
use System\RulesEngine\Constants\Components;
use System\RulesEngine\Facades\Rule;
use Services\SupplierRegistrationService;

class SupplierContractService
{

    private $Contracting;
    private $supplierRegistration;


    public function __construct(Contracting $contracting)
    {
        $this->Contracting = $contracting;
    }

    public function addService($data)
    {

        return $this->addContract($data);
    }

    public function addContract($data)
    {

        $tenant_id = $data['tenant_id'];


        if(!(Rule::validate(Components::CONTRACTING, $tenant_id))){

           // session()->flash('alert-danger', 'Number of Insertions Exceeded.');

           // return redirect()->route('show_supplier_services');
            return false;
        }

        $job_type = $data['_type'];
        $typeofwork = $data['typeofwork'];
        $description= $data['description'];

        $company = Company::where('tenant_id', $tenant_id)->first();
        $companyId = $company->id;

        $contracting =  $this->Contracting->create(
           [
                'main_category' => $typeofwork,

                'description' => $description,

                'tenant_id' => $tenant_id,

                'job_type' => $job_type,

               'company_id' => $companyId
            ]
        );
        event(new AddingContracting($contracting));
        return $contracting;
    }

    public function jobTypes(){
        return JobTypes::all()->toArray();
    }

    public function workTypes(){
        return ServiceProperty::all()->toArray();
    }

    public function contractingTableData($tenantId){
        return Contracting::where('tenant_id', $tenantId)->with(['JobType', 'WorkType'])->get();
    }

    public function contractingCategory($tenantId){
        return Contracting::select('work_type_id')->where('tenant_id', $tenantId)->groupBy('work_type_id')->get();
    }

    public function deleteContracting($id){
        $contracting = Contracting::find($id);
        $contracting->delete();
        event(new RemovingContracting($contracting));
    }

    public function contractingData($id)
    {
        return Contracting::where('id', $id)->with(['JobType', 'WorkType'])->first();
    }

    public function editContractingService($data){
        $id = $data['id'];
        $contracting = Contracting::find($id);
        $contracting->main_category = $data['typeofwork'];
        $contracting->description = $data['description'];;
        $contracting->save();
    }

    public function contractingList($tenantId){
        $workTypes = $this->workTypes();

        $contractingTableData = $this->contractingTableData($tenantId);

        $contractingList = array();
        foreach($workTypes as $workType){
            foreach($contractingTableData as $contracting){
                if($contracting->main_category == $workType['id']){
                    // $contractingList['job_type'] = $contracting->job_type;
                    $contractingList[$contracting->job_type]['main_category'][$contracting->main_category] = $workType['label'];
                }
            }
        }

        return $contractingList;
    }

}