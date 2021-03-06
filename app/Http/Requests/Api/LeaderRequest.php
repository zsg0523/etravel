<?php

namespace App\Http\Requests\Api;

class LeaderRequest extends FormRequest
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
                    'leader' => 'required|string|max:50',
                ];
                break;
            
            case 'PATCH':
                return [
                    'leader' =>'string',
                ];
                break;
        }
    }
}
