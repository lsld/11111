<?php

namespace Web\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;


class MaterialValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'street_address'    => 'required',
            'suburb'            => 'required',
            'post_code'         => 'required|max:5',
            'state_id'          => 'required',
            'regions_id'        => 'required',
            'duration'          => 'required',
            'description'       => 'required',
            'expiry_date'       => 'required|date_format:m/d/Y|after:'.date('m/d/Y'),

            'quantity'          => 'required|numeric|min:1',
            'resource_type'     => 'required',
            'condition'         => 'required'
        ];

        return $rules;
    }
    
}
