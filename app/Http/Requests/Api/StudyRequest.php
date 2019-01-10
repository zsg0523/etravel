<?php

namespace App\Http\Requests\Api;

class StudyRequest extends FormRequest
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
                    'title' => 'required|max:25',
                    'body' => 'required|max:255',
                    'image' => 'mimes:jpeg,bmp,png,gif'
                ];
                break;
            
            case 'PATCH':
                return [
                    'title' => 'string|max:25',
                    'body' => 'string|max:255',
                    'image' => 'mimes:jpeg,bmp,png,gif'
                ];
                break;
        }
    }















}
