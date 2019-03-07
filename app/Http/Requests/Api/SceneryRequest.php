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
                    'content' => 'required',
                    'description' => 'required'
                ];
                break;
            
            case 'PATCH':
                return [
                    'time' => 'string',
                    'description' => 'string'
                ];
                break;
        }
    }
}
