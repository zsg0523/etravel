<?php

namespace App\Http\Requests\Api;

class EvaluationRequest extends FormRequest
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
                    'content' => 'required|string',
                    'type' => 'required|integer'
                ];
                break;
            
            case 'PATCH':
                return [
                    'content' => 'string',
                    'type' => 'integer'
                ];
                break;
        }
    }
}
