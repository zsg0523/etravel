<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Api\UserRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendCode;

class EmailCodesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        // 定义自定义key
        $key = 'emailCode_'.str_random(15);
        // 生成四位随机数 左侧补0
        $code = str_pad(random_int(1, 9999), 4, 0, STR_PAD_LEFT);

        $expiredAt = now()->addMinutes(10);
        // 缓存码十分钟后过期
        \Cache::put($key, ['code' => $code], $expiredAt);

        $email = $request->email;
        $data = ['email'=>$email, 'activationcode'=>$code];

        // Mail::send('activemail', $data, function($message) use($data)
        // {
        //     $message->to($data['email'])->subject('验证码');
        // });

        Mail::to($email)
            ->cc('262323675@qq.com')
            ->queue(new SendCode($code));

        return $this->response->array([
            'key' => $key,
            'expired_at' => $expiredAt->toDateTimeString(),
        ])->setStatusCode(201);
    }
}
