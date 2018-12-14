<?php

namespace App\Http\Requests\Api;

class FoodRequest extends FormRequest
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
                    'title' => 'required|string',
                    'content' => 'required|string',
                    'description' => 'required|string'
                ];
                break;
            
            case 'PATCH':
                return [
                    'title' => 'string',
                    'content' => 'string',
                    'description' => 'string'
                ];
                break;
        }
    }
}
