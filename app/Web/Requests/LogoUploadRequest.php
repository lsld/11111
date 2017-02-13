<?php

namespace Web\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogoUploadRequest extends FormRequest
{

    public function rules()
    {
        return [
            'logo'  =>  'required|max:10000|mimes:png,jpeg,gif',
        ];
    }

    public function authorize()
    {
        return true;
    }
}