<?php

namespace Web\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;


class AdminUserValidationEdit extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        ///$data = Request::all();
       // dd($data);
        $rules = [
            'first_name'    => 'required|alpha',
            'last_name'     => 'required|alpha',
            'phone'         => 'required|phone',
            'admin_user_role'=>  'required',
            'state_id'     => 'required|array|min:1',
        ];
        /*
            'state_id'     => 'required|array|min:1',*/
        return $rules;
    }
}