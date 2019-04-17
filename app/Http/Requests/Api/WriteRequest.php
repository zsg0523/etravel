<?php

namespace App\Http\Requests\Api;

class WriteRequest extends FormRequest
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
                    // 'content' => 'required|max:255'
               ];
                break;
            
            case 'PATCH':
                return [
                    'content' => 'string|max:255'
                ];
                break;
        }
    }
}
