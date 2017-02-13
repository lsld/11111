<?php

namespace Web\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class SupplierSingUpLocationRequest extends FormRequest
{

    public function rules()
    {
        $rules =  [
            'name' => 'required',
            'street_address' => 'required',
            'states_id' => 'required',
           /* 'regions_id' => 'required',*/
            'suburb' => 'required',
            'post_code' => 'required|max:5',
            'email' => 'required|email',
            'phone' => 'required|numeric',

            //select_all_regions
        ];
            $data = Request::all();
            if (isset($data['select_all_regions']) ){}
            else{
                $rules['regions_id'] = 'required';
            }
        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'This filed is required!',
            'street_address.required' => 'This filed is required!',
            'states_id.required' => 'This filed is required!',
            'suburb.required' => 'This filed is required!',
            'post_code.required' => 'This filed is required!',
        ];
    }

    public function authorize()
    {
        return true;
    }
}