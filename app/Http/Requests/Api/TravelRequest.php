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
                    'travel_name' => 'required|max:50',
                    'travel_introduction' => 'required|max:255',
                    'travel_at' => 'required|date_format:"Y-m-d"'
                ];
                break;
            
            case 'PATCH':
                return [
                    'travel_name' => 'string',
                    'travel_introduction' => 'string',
                    'travel_at' => 'date_format:"Y-m-d"'
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'travel_name.required' => "項目名稱不能為空！",
            'travel_introduction.required' => "項目介紹不能為空！",
            'travel_at' => "時間不能為空！"
        ];
    }
}
