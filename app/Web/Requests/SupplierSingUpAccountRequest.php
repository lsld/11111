<?php

namespace Web\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierSingUpAccountRequest extends FormRequest
{

    public function rules()
    {
        return [
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'email' => 'required|email|unique:users,email',
            'company_name' => 'required',
            'phone' => 'required|phone',
            'username' => 'required|min:3|unique:users,username',
            'password'  =>  'required|min:6|confirmed',
        ];
    }

    public function authorize()
    {
        return true;
    }
}