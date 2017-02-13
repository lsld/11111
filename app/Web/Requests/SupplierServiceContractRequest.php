<?php
/**
 * Created by PhpStorm.
 * User: lasath
 * Date: 11/29/16
 * Time: 3:37 PM
 */

namespace Web\Requests;

use Illuminate\Foundation\Http\FormRequest;


class SupplierServiceContractRequest extends FormRequest
{
    public function rules()
    {
        return [
            'typeofwork' => 'required',
            'description' => 'required'
        ];
    }

    public function authorize()
    {
        return true;
    }

}