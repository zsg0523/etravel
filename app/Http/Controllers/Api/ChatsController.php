<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use \GatewayWorker\Lib\Gateway;
use App\Models\User;

class ChatsController extends Controller
{
	/** [bind 绑定客户端和uid] */
    public function bind(Request $request)
    {
    	$user_id = $this->user()->id;
    	$client_id = $request->client_id;

    	return Gateway::bindUid($client_id, $user_id);
    }

    /** [messages 发送消息] */
    public function messages(Request $request)
    {	
    	$user_id = $this->user()->id;

    	// 给所有用户广播消息
    	Gateway::sendToAll($request->message);

    	// 给对应 uid 的客户端发送消息
    	Gateway::sendToUid($user_id, $request->message);

    	return $this->response->array([
    		'message' => 'message send success !'
    	]);
    }






}
