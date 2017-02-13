<?php

namespace Web\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;


class FillValidation extends FormRequest
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

            'required_date'     => 'required|date_format:m/d/Y|after:'.date('m/d/Y'),
            'quantity'          => 'required|numeric|min:1|max:10000',
            'number_of_sites'   => 'required|numeric|min:1|max:10000',
            'fill_type'         => 'required',
            'can_load_and_carry'=> 'required',
            'fill_quality'      => 'required'
        ];
        $data = Request::all();
        if ($data['can_load_and_carry'] == 1 )
        {
            $rules['distance'] = 'required';
        }
        return $rules;
    }

}
