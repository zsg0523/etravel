<?php

namespace App\Http\Requests\Api;

class LocationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'coordinate' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'coordinate.required' => '定位不能为空！',
        ];
    }
}
