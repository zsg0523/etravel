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
                    'date' => 'required|date_format:"Y-m-d"',
                    'from' => 'required',
                    'to' => 'required',
                    'flight' => 'required',
                    'takeoff_time' => 'required',
                    'arrival_time' => 'required',
                    'is_return' => 'required|boolean',
                    'travel_id' => 'required|integer'
                ];
                break;
            
            case 'PATCH':
                return [
                    'date' => 'string|date_format:"Y-m-d"',
                    'from' => 'string',
                    'to' => 'string',
                    'flight' => 'string',
                    'takeoff_time' => 'string',
                    'arrival_time' => 'string',
                    'is_return' => 'boolean',
                    'travel_id' => 'integer'
                ];
                break;
        }
    }
}
