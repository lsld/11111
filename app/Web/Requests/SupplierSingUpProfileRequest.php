<?php

namespace Web\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierSingUpProfileRequest extends FormRequest
{

    public function rules()
    {
        return [
            'company_profile' => 'required',
            'company_email' => 'required|email',
            'phone1' => 'required|min:10',
            'phone2' => 'min:10',
            'operating_category_id'  =>  'required',
            'about'  =>  'required',
            'services'  =>  'required',
            'projects'  =>  'required',
            'states_id' => 'required'
        ];
    }

    public function authorize()
    {
        return true;
    }
}