<?php

namespace App\Http\Requests\Api;

class LocalRequest extends FormRequest
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
                    // 'title' => 'required|string|max:50',
                    'content' => 'required',
                ];
                break;
            
            case 'PATCH':
                return [
                    'title' =>'string',
                    'content' => 'string',
                ];
                break;
        }
    }
    
}
