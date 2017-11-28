<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BunchRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return ['name' => 'required|min:5|max:45'];
    }
}
