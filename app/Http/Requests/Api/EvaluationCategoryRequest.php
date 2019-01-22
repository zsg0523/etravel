<?php

namespace App\Http\Requests\Api;

class EvaluationCategoryRequest extends FormRequest
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
                ];
                break;
            
            case 'PATCH':
                return [
                    'title' => 'string',
                ];
                break;
        }
    }
}
