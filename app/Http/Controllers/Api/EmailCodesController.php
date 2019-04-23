<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\EmailCodesRequest;

class EmailCodesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmailCodesRequest $request)
    {
        // 定义自定义key
        $key = 'emailCode_'.str_random(15);
        // 自定义code
        $code = rand(1000,9999);
        // 用户信息
        $user = $this->user();
        dd($user);
        $expiredAt = now()->addMinutes(10);
        // 缓存码十分钟后过期
        \Cache::put($key, ['code' => $code], $expiredAt);

        $data = ['email'=>'262323675@qq.com', 'name'=>'name', 'uid'=>'123', 'activationcode'=>'123'];
        Mail::send('activemail', $data, function($message) use($data)
        {
            $result = $message->to($data['email'], $data['name'])->subject('欢迎注册我们的网站，请激活您的账号！');
        });
    
        dd($result);
        return $this->response->array([
            'key' => $key,
            'expired_at' => $expiredAt->toDateTimeString(),
        ])->setStatusCode(201);
    }
}
