<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'      => 'required',
            'email'     => 'required',
            'address'   => 'required',
            'gender'    => 'required',
            'ph_number' => 'required|min:8|numeric',
        ];
    }
}
