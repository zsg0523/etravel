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

    public function messages()
    {
        return [
            'travel_name.required' => "项目名称不能为空！",
            'travel_introduction.required' => "项目介绍不能为空！",
            'travel_at' => "时间不能空！"
        ];
    }
}
