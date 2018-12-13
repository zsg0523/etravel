<?php

namespace App\Http\Requests\Api;

class GroupRequest extends FormRequest
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
                    'duty' => 'required|string',
                    'room' => 'required'
                ];
                break;
            
            case 'PATCH':
                return [
                    'duty' => 'string',
                ];
                break;
        }
    }
}
