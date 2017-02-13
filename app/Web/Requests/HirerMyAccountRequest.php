<?php

namespace Web\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HirerMyAccountRequest extends FormRequest
{
    public function rules()
    {
        return [
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'company_name' => 'required',
            'street_address' => 'required',
            'states_id' => 'required',
            'post_code' => 'max:5',
            'regions_id' => 'required',
            'phone' => 'required|phone',
        ];
    }

    public function authorize()
    {
        return true;
    }
}