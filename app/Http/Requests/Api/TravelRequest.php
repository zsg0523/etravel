<?php

namespace App\Http\Requests\Api;

class TravelRequest extends FormRequest
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
                    'travel_name' => 'required|max:25',
                    'travel_introduction' => 'required|max:255',
                    'travel_at' => 'required|date'
                ];
                break;
            
            case 'PATCH':
                return [
                    'travel_name' => 'string',
                    'travel_introduction' => 'string',
                    'travel_at' => 'date'
                ];
                break;
        }
    }
}
