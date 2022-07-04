<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'       => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'image'       => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
