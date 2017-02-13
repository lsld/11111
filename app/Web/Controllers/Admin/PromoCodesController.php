<?php

namespace Web\Controllers\Admin;
use Illuminate\Http\Request;
use Services\PromoCodesService;
use App\Constants\Services;
use Services\JobRequest\JobRequestService;

use Web\Requests\AdminCodeValidation;

class PromoCodesController {

    protected $codeStatus = array();
    protected $promoCodesService;

    public function __construct(PromoCodesService $PromoCodesService, JobRequestService $service) {
        $this->promoCodesService = $PromoCodesService;
        $this->service = $service;
        $this->codeStatus = [
            Services::ACTIVATED => 'ACTIVATED',
            Services::DEACTIVATED => 'DEACTIVATED',
            Services::EXPIRED => 'EXPIRED',
            Services::DELETED => 'DELETED',
        ];
    }

    public function codeList() {
        $codeStatus = $this->codeStatus;
        $code_list = $this->promoCodesService->viewList();
        $states = $this->service->getStates();

        return view('admin.promoCodes.list')->with(compact('codeStatus', 'code_list', 'states'));
    }

    public function changeStatus($id, $status) {
        $this->promoCodesService->changeStatus($id, $status);
        return back()->with('message.success', 'Successfully Changed Status');
    }

    public function codeCreate() { 
        $codeStatus = $this->codeStatus;
        return view('admin.promoCodes.create')->with(compact('codeStatus'));
    }
    
    public function validate(AdminCodeValidation $request){
        return 'true';
    }
    
    public function store(AdminCodeValidation $request){

        $this->promoCodesService->createPromoCode($request);

        return redirect()->route('admin.code.list')->with('message.success', 'Promo Code Created Successfully');

    }
    
    public function edit($id){
        $codeStatus = $this->codeStatus;
        $code_data  = $this->promoCodesService->getCodeData($id);
        $current_role = 'edit';

        return view('admin.promoCodes.create')->with(compact('codeStatus', 'code_data', 'current_role'));
    }
    
    public function update($id, AdminCodeValidation $request){

        $this->promoCodesService->updatePromoCode($id, $request);
        return redirect()->route('admin.code.list')->with('message.success', 'Promo Code Updated Successfully');
    }

}
