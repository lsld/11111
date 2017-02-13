<?php
/**
 * Created by PhpStorm.
 * User: lasath
 * Date: 11/28/16
 * Time: 4:21 PM
 */

namespace Web\Requests;

use Illuminate\Foundation\Http\FormRequest;


class SupplierServicePlantRequest extends FormRequest
{

   public function rules()
    {
        return [
            'itemtype'  => 'required',
            'hiretype'  => 'required',
            'desc'      => 'required',
            'quantity'  => 'required|numeric',
        ];
    }

    public function authorize()
    {
        return true;
    }

}
