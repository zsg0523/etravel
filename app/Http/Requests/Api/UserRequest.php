<?php

namespace App\Http\Requests\Api;

class UserRequest extends FormRequest
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
                if(isset($this->verification_key) && $this->verification_code)
                {
                    return [
                        'name' => 'required|between:2,25|unique:users,name',
                        'password' => 'required|string|min:6',
                        'verification_key' => 'required|string',
                        'verification_code' => 'required|string',
                        'en_name' => 'required|between:2,25|unique:users,en_name'
                    ]; 
                } else if(isset($this->key) && $this->code) {
                    return [
                        'email' => 'required|unique:users,email',
                    ];
                } else if(isset($this->email) || empty($this->email)) {
                    return [
                        'email' => 'required|email',
                    ];
                } else {
                    return [
                        'name' => 'required|between:2,25|unique:users,name',
                        'original_password' => 'required|string|min:6',
                        'email' => 'unique:users,email',
                        'phone' => 'required|unique:users,phone',
                        'en_name' => 'required|between:2,25|unique:users,en_name'
                    ];
                }
                break;
            case 'PATCH':
                $userId = isset($this->user_id) ? $this->user_id :  \Auth::guard('api')->id();

                return [
                    'name' => 'between:2,25' . $userId,
                    'email' => 'email',
                    'introduction' => 'max:80',
                    'avatar_image_id' => 'exists:images,id,type,avatar,user_id,' . $userId,
                    'en_name' => 'between:2,25'
                ];
                break;
        }
    }


    public function attributes()
    {
        return [
            'verification_key' => '短信验证码 key',
            'verification_code' => '短信验证码',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名称不能为空！',
            'en_name.required' => '英文名称不能为空！',
        ];
    }






}
