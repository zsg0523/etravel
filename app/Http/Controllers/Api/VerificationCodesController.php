<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Overtrue\EasySms\EasySms;
use Overtrue\EasySms\PhoneNumber;
use App\Http\Requests\Api\VerificationCodeRequest;

class VerificationCodesController extends Controller
{
	/** [store 注册生成短信验证码] */
    public function store(VerificationCodeRequest $request, EasySms $easySms)
    {	
    	// $phones = explode('-', $request->phone);
    	// 根据区号不同，发送国际短信
    	$phone = new PhoneNumber($request->phone, $request->idd_code);
    	// $phone = new PhoneNumber($phones[1], $phones[0]);
    	// 生成四位随机数 左侧补0
    	$code = str_pad(random_int(1, 9999), 4, 0, STR_PAD_LEFT);

    	if ( ! app()->environment('production')) {
    		$code = '1234';
    	} else {
    		try {
			    $easySms->send($phone, [
			        'data' => [
			        	$code,
			        	'1',
			        ],
			        'template'  => '127203',
			    ]);
			} catch (\Overtrue\EasySms\Exceptions\NoGatewayAvailableException $exception) {
			    $message = $exception->getException('qcloud')->getMessage();
			    return $this->response->errorInternal($message ?: '短信发送异常');
			}
    	}

		$key = 'verificationCode_'.str_random(15);
		$expiredAt = now()->addMinutes(10);
		// 缓存码十分钟后过期
		\Cache::put($key, ['phone' => $phone, 'code' => $code], $expiredAt);

    	return $this->response->array([
    		'key' => $key,
    		'expired_at' => $expiredAt->toDateTimeString(),
    	])->setStatusCode(201);

    }



    /** [store 注册生成短信验证码] */
    public function store_v2(VerificationCodeRequest $request, EasySms $easySms)
    {	
    	// 根据区号不同，发送国际短信
    	$phone = new PhoneNumber($request->phone, $request->idd_code);
    	// 生成四位随机数 左侧补0
    	$code = str_pad(random_int(1, 9999), 4, 0, STR_PAD_LEFT);

    	if ( ! app()->environment('production')) {
    		$code = '1234';
    	} else {
    		try {
			    $easySms->send($phone, [
			        'data' => [
			        	$code,
			        	'1',
			        ],
			        'template'  => '127203',
			    ]);
			} catch (\Overtrue\EasySms\Exceptions\NoGatewayAvailableException $exception) {
			    $message = $exception->getException('qcloud')->getMessage();
			    return $this->response->errorInternal($message ?: '短信发送异常');
			}
    	}

		$key = 'verificationCode_'.str_random(15);
		$expiredAt = now()->addMinutes(10);
		// 缓存码十分钟后过期
		\Cache::put($key, ['phone' => $phone, 'code' => $code], $expiredAt);

    	return $this->response->array([
    		'key' => $key,
    		'expired_at' => $expiredAt->toDateTimeString(),
    	])->setStatusCode(201);

    }





}
