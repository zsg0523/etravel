<?php

namespace App\Http\Requests\Api;

class ImageRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules =  [
            'type' => 'required|string|in:avatar,travel,local',
        ];
        if($this->type =='avatar') {
            // $rules['image'] = 'required|mimes:jpeg,bmp,png,gif|dimensions:min_width:200,min_height:200';
            $rules['image'] = 'required';

        }else {
            $rules['image'] = 'required';
        }

        return $rules;
    }


    public function messages()
    {
        return [
            'image.dimensions' => '圖片清晰度不夠，寬和高需 200px 以上'
        ];
    }



}
