<?php

namespace App\Http\Requests\Api;

class ExamineRequest extends FormRequest
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
                    'before' => 'required|boolean',
                    'after' => 'required|boolean'
                ];
                break;
            
            case 'PATCH':
                return [
                    'before' => 'boolean',
                    'after' => 'boolean'
                ];
                break;
        }
    }
}
