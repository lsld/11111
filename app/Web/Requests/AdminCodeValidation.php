<?php

namespace Web\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;


class AdminCodeValidation extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        $rules = [
            'code_name'    => 'required',
            'code_id'     => 'required',
            'status'         => 'required',
            'from_date'         => 'required',
            'to_date'      => 'required',
            'discount'      =>  'required',
            'states_id'     => 'required|array|min:1',
        ];

        return $rules;
    }
}