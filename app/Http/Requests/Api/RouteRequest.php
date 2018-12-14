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
                   'day' => 'required|string',
                   'date' => 'required|date',
                   'description' => 'required|string'
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
