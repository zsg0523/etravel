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
                        'name' => 'required',
                        'password' => 'required|string|min:6',
                        'verification_key' => 'required|string',
                        'verification_code' => 'required|string',
                        'en_name' => 'required'
                    ]; 
                } else if(isset($this->key) && $this->code) {
                    return [
                        'email' => 'required|unique:users,email',
                    ];
                } else if(isset($this->email)) {
                    return [
                        'email' => 'required|email',
                    ];
                } else {
                    return [
                        'name' => 'required',
                        'original_password' => 'required|string|min:6',
                        'email' => 'unique:users,email',
                        'phone' => 'required|unique:users,phone',
                        'en_name' => 'required'
                    ];
                }
                break;
            case 'PATCH':
                $userId = isset($this->user_id) ? $this->user_id :  \Auth::guard('api')->id();

                if($this->verification_key) {
                    return [
                        'phone' => 'unique:users,phone,' . $userId,
                        'verification_key' => 'required|string',
                        'verification_code' => 'required|integer',
                        'code' => 'required|integer'
                    ];
                } else {
                    return [
                        'email' => 'email|unique:users,email,' . $userId,
                        'phone' => 'unique:users,phone,' . $userId,
                        'introduction' => 'max:80',
                        'avatar_image_id' => 'exists:images,id,type,avatar,user_id,' . $userId,
                    ];
                }      
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
            'name.required' => '名稱不能為空！',
            'en_name.required' => '英文名稱不能為空！',
            'verification_code.required' => '短信驗證碼不能為空！'
        ];
    }






}
