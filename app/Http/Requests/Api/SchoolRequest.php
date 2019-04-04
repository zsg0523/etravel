<?php

namespace App\Http\Requests\Api;

class SchoolRequest extends FormRequest
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
                    'school_name' => 'required|string',
                    'school_introduction' => 'required|string',
                    'school_address' => 'required|string',
                ];
                break;
            
            case 'PATCH':
                return [
                    'school_name' => 'string',
                    'school_introduction' => 'string',
                    'school_address' => 'string',
                ];
                break;
        }
    }
}
