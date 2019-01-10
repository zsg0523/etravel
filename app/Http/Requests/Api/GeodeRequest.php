<?php

namespace App\Http\Requests\Api;

class GeodeRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'address' => 'required|string',
            'city' =>'required|string',
            'state' => 'required|string'
        ];
    }
}
