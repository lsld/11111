<?php
/**
 * Created by PhpStorm.
 * User: lasath
 * Date: 11/29/16
 * Time: 11:33 PM
 */

namespace Web\Requests;

use Illuminate\Foundation\Http\FormRequest;


class SupplierServiceFillRequest extends FormRequest
{
    public function rules()
    {
        return [
            'filltype' => 'required',
            'fillquality' => 'required',
            'loadandcarry' => 'required',
        ];
    }

    public function authorize()
    {
        return true;
    }
}