<?php

namespace App\Http\Requests\Api;

class AnswerRequest extends FormRequest
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
                    'content' => 'required|max:255'
                ];
                break;
            
            case 'PATCH':
                return [
                    'content' => 'string'
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'content.required' => "內容不能為空！"
        ];
    }
}
