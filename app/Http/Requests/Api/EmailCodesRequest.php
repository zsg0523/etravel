<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class EmailCodesRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'name' => 'required|between:2,25|unique:users,name',
            // 'password' => 'required|string|min:6',
            // 'verification_key' => 'required|string',
            // 'verification_code' => 'required|string',
            // 'en_name' => 'required|between:2,25|unique:users,en_name'
        ];
    }
}
