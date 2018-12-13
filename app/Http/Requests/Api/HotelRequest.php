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
                    'hotel_date' => 'required',
                    'hotel_address' => 'required',
                    'hotel_phone' => 'required'
                ];
                break;
            
            case 'PATCH':
                return [
                    'travel_id' => 'integer',
                    'hotel_name' => 'string',
                    'hotel_date' => 'string',
                    'hotel_address' => 'string',
                    'hotel_phone' => 'string'
                ];
                break;
        }
    }
}
