<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'old_password'     => 'required',
            'new_password'     => 'required| min:8',
            'confirm_password' => 'required|same:new_password'
        ];
    }
}
