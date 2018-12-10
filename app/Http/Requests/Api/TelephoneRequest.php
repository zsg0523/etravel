<?php

namespace App\Http\Requests\Api;

use App\Models\Telephone;
use Dingo\Api\Http\FormRequest;

class TelephoneRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

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
                    'phone' => 'required|unique:telephones'
                ];
                break;
            
            case 'PATCH':
                return [
                    'name' => 'string',
                    'phone' => 'unique:telephones'
                ];
                break;
        }
    }
}
