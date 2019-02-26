<?php

namespace App\Http\Requests\Api;

class VerificationCodeRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if(isset($this->un_unique)){
            // 合法电话
            return [
                'phone' => [
                    'required',
                    'regex:/^((13[0-9])|(14[5,7])|(15[0-3,5-9])|(17[0,3,5-8])|(18[0-9])|166|198|199|(147))\d{8}$/',
                ]
            ];
        } else {
            // 合法电话且未注册
            return [
                'phone' => [
                    'required',
                    'regex:/^((13[0-9])|(14[5,7])|(15[0-3,5-9])|(17[0,3,5-8])|(18[0-9])|166|198|199|(147))\d{8}$/',
                    'unique:users'
                ]
            ];
        }
    }
}
