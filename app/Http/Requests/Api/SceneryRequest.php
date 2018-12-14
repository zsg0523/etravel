<?php

namespace App\Http\Requests\Api;

class SceneryRequest extends FormRequest
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
                    'time' => 'required',
                    'content' => 'required|string',
                    'description' => 'required|string'
                ];
                break;
            
            case 'PATCH':
                return [
                    'time' => 'string',
                    'content' => 'string',
                    'description' => 'string'
                ];
                break;
        }
    }
}
