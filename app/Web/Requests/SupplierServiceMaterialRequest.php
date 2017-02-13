<?php
/**
 * Created by PhpStorm.
 * User: lasath
 * Date: 11/29/16
 * Time: 9:08 PM
 */

namespace Web\Requests;

use Illuminate\Foundation\Http\FormRequest;


class SupplierServiceMaterialRequest extends FormRequest
{
    public function rules()
    {
        return [
            'resourcetype' => 'required',
            'quality' => 'required'
        ];
    }

    public function authorize()
    {
        return true;
    }
}