<?php
/**
 * Created by PhpStorm.
 * User: lasath
 * Date: 12/4/16
 * Time: 11:32 AM
 */

namespace Web\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierQuotesUpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'price' => 'required',
            'expiry_date' => 'required'
        ];
    }

    public function authorize()
    {
        return true;
    }
}


