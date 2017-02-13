<?php
/**
 * Created by PhpStorm.
 * User: lasath
 * Date: 11/29/16
 * Time: 11:44 PM
 */

namespace Services;
use App\Events\AddingFill;
use App\Events\RemovingFill;
use App\Models\Fill;
use App\Models\FillType;
use App\Models\Company;
use System\RulesEngine\Constants\Components;
use System\RulesEngine\Facades\Rule;
use Services\SupplierRegistrationService;


class SupplierFillService
{
    private $fill;
    private $supplierRegistration;

    public function __construct(Fill $fill)
    {
        $this->fill = $fill;
    }

    public function addService($data)
    {
        return $this->addFill($data);
    }

    public function addFill($data)
    {
        $job_type = $data['_type'];

        $tenant_id = $data['tenant_id'];

        //TODO@Lakitha validate with rules engine and return the message
        if(!(Rule::validate(Components::MATERIAL_FILL, $tenant_id))){

           // session()->flash('alert-danger', 'Number of Insertions Exceeded.');

           // return redirect()->route('show_supplier_services');
            return false;
        }


        $fill_type_id = $data['filltype'];

        $fill_quality = $data['fillquality'];

        $can_load_and_carry = $data['loadandcarry'];

        $company = Company::where('tenant_id', $tenant_id)->first();
        $companyId = $company->id;


        $fill = $this->fill->create(
            [
                'main_category' => $fill_type_id,

                'fill_quality' => $fill_quality,

                'can_load_and_carry' => $can_load_and_carry,

                'tenant_id' => $tenant_id,

                'job_type' => $job_type,

                'company_id' => $companyId
            ]
        );

        event(new AddingFill($fill));
        return $fill;
    }


    public function fillType(){
        return FillType::all()->toArray();
    }

    public function fillTableData($tenantId){
        return Fill::where('tenant_id', $tenantId)->with(['FillType'])->get();
    }

    public function fillCategory($tenantId){
        return Fill::select('fill_type_id')->where('tenant_id', $tenantId)->groupBy('fill_type_id')->get();
    }

    public function deleteFill($id){
        $fill = Fill::find($id);
        $fill->delete();
        event(new RemovingFill($fill));
    }

    public function fillData($id)
    {
        return Fill::where('id', $id)->with(['FillType'])->first();
    }

    public function editFillService($data){
        $id = $data['id'];
        $fill = Fill::find($id);
        $fill->main_category = $data['filltype'];
        $fill->fill_quality = $data['fillquality'];
        $fill->can_load_and_carry = $data['loadandcarry'];
        $fill->save();
    }

    public function fillList($tenantId){

        $fillTypes = $this->fillType();

        $fillTableData = $this->fillTableData($tenantId);

        $fillList = array();
        foreach($fillTableData as $fill){
            foreach($fillTypes as $fillType){
                if($fill->main_category == $fillType['id']){
                    //$filllList['job_type'] = $fill->job_type;
                    $fillList[$fill->job_type]['main_category'][$fill->main_category] = $fillType['name'];
                }
            }
        }

        return $fillList;
    }
}