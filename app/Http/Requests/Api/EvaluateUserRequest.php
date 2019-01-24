<?php

namespace App\Http\Requests\Api;

class EvaluateUserRequest extends FormRequest
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
                    'option' => 'required|integer'
                ];
                break;
            case 'PATCH':
                return [
                    'option' => 'integer'
                ];
                break;
        }
    }
}
