<?php

namespace App\Http\Requests\Api;

use App\Models\Travel;
use Illuminate\Foundation\Http\FormRequest;

class TravelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

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
