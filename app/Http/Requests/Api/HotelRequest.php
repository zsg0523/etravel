<?php

namespace App\Http\Requests\Api;

class HotelRequest extends FormRequest
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
                    'travel_id' => 'required|integer',
                    'hotel_name' => 'required',
                    'check_at' => 'required|date_format:"Y-m-d"',
                    'leave_at' => 'required|date_format:"Y-m-d"',
                    'times' => 'required|integer',
                    'hotel_address' => 'required',
                    'hotel_phone' => 'required',
                    'hotel_location' => 'required'
                ];
                break;
            
            case 'PATCH':
                return [
                    'travel_id' => 'integer',
                    'hotel_name' => 'string',
                    'check_at' => 'date_format:"Y-m-d"',
                    'leave_at' => 'date_format:"Y-m-d"',
                    'times' => 'integer',
                    'hotel_address' => 'string',
                    'hotel_phone' => 'string',
                    'hotel_location' => 'string'
                ];
                break;
        }
    }
}
