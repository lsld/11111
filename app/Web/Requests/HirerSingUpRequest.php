<?php

namespace Web\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HirerSingUpRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|phone',
            'username' => 'required|min:3|unique:users,username',
            'password'  =>  'required|min:6|confirmed',
            'terms'  =>  'required',
            'policy'  =>  'required',
        ];
    }

    public function authorize()
    {
        return true;
    }
    public function messages(){
        return [
            'first_name' => 'This field is required',
            'last_name' => 'This field is required',
            'company_name' => 'This field is required',
            'street_address' => 'This field is required',
            'states_id' => 'This field is required',
            'post_code' => 'This field is required',
            'regions_id' => 'This field is required',
            'email' => 'This field is required',
            'phone' => 'This field is required',
            'username' => 'This field is required',
            'password' => 'This field is required',
            'terms' => 'This field is required',
            'policy' => 'This field is required',

        ];
    }
}