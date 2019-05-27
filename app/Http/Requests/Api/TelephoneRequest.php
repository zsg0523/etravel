<?php

namespace App\Http\Requests\Api;

class TelephoneRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'name' => 'required',
                    // 'phone' => 'required|unique:telephones'
                    'phone' => 'required'
                ];
                break;
            
            case 'PATCH':
                // $id = $this->id;
                return [
                    'name' => 'string',
                    // 'phone' => 'unique:telephones,phone,' . $this->route('telephone')->id,
                    'phone' => 'required'
                ];
                break;
        }
    }
}
