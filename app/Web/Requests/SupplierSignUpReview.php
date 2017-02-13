<?php

namespace Web\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierSignUpReview extends FormRequest
{
    public function rules()
    {
        return [
            'condition_terms' => 'required',
            'condition_privacy' => 'required',
        ];
    }

    public function authorize()
    {
        return true;
    }
}