<?php

namespace Web\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierMyAccountRequest extends FormRequest
{
    public function rules()
    {
        return [
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'company_name' => 'required',
        ];
    }

    public function authorize()
    {
        return true;
    }
}