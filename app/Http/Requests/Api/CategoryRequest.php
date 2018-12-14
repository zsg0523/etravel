<?php

namespace App\Http\Requests\Api;

class CategoryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'GET':
                return [
                    'type' => 'required|integer'
                ];
                break;
            case 'POST':
                return [
                    'rule_category_name' => 'required|string',
                    'type' => 'required|integer'
                ];
                break;
            
            case 'PATCH':
                return [
                    'rule_category_name' => 'string',
                    'type' => 'integer'
                ];
                break;
        }
    }
}
