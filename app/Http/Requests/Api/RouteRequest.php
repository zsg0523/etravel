<?php

namespace App\Http\Requests\Api;

class RouteRequest extends FormRequest
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
                   'day' => 'string',
                   'date' => 'date',
                   'description' => 'string'
                ];
                break;
            
            case 'PATCH':
                return [
                    'day' => 'string',
                    'date' => 'date',
                    'description' => 'string'
                ];
                break;
        }
    }
}
