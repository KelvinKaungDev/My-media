<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'password'  => 'required',
            'ph_number' => 'required|numeric|min:8',
        ];
    }
}
