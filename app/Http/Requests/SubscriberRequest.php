<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscriberRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'f_name', 'l_name' => 'required|min:1|max:45',
            'email' => 'required',
        ];
    }
}
