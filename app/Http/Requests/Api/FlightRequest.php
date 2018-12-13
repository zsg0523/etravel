<?php

namespace App\Http\Requests\Api;

class FlightRequest extends FormRequest
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
                    'date' => 'required|date',
                    'site' => 'required',
                    'flight' => 'required',
                    'takeoff_time' => 'required|date',
                    'arrival_time' => 'required|date',
                    'is_return' => 'required|boolean',
                    'travel_id' => 'required|integer'
                ];
                break;
            
            case 'PATCH':
                return [
                    'date' => 'string|date',
                    'site' => 'string',
                    'flight' => 'string',
                    'takeoff_time' => 'string|date',
                    'arrival_time' => 'string|date',
                    'is_return' => 'boolean',
                    'travel_id' => 'integer'
                ];
                break;
        }
    }
}
