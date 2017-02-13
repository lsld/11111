<?php

namespace Web\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierSignupPackageRequest extends FormRequest
{
    public function rules()
    {
        return [
            'package' => 'required'
        ];
    }

    public function authorize()
    {
        return true;
    }
}