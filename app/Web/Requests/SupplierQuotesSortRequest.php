<?php

namespace Web\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierQuotesSortRequest extends FormRequest
{
    public function rules()
    {
        return [
            'submitted_at' => '',
            'q_expiry_date' => '',
            'r_expiry_date' => '',
            'created_at' => '',
            'status' => '',
            'searchKey' => '',
        ];
    }

    public function authorize()
    {
        return true;
    }
}