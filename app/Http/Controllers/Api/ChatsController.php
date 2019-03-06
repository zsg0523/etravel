<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use \GatewayWorker\Lib\Gateway;
use App\Models\User;
use App\Models\Travel;

class ChatsController extends Controller
{
	/** [bind 绑定客户端和uid] */
    public function bind(Request $request, User $user)
    {
    	$client_id = $request->client_id;
        $room_id = $request->room_id;

        // 绑定 uid 和 client_id 加入房间
        Gateway::bindUid($client_id, $user->id);
        Gateway::joinGroup($client_id, $room_id);

        session(['client_id' => $client_id]);
        Gateway::setSession($client_id, [
            'uid' => $user->id,
            'username' => $user->name,
            'avatar' => $user->avatar,
            'bubble' => $user->bubble,
            'room_id' => $room_id,
        ]);

    	return $this->response->array(['message' => "bind success"]);
    }

    /**
     * [messages 消息发送]
     * @param  Request $request [发送内容]
     * @return [type]           [description]
     */
    public function messages(Request $request)
    {	
        $user = $this->user();
        switch ($request->type) {
            case 'all':
                Gateway::sendToAll(json_encode([
                    'type' => 'group',
                    'uid' => $user->id,
                    'username' => $user->name,
                    'avatar' => $user->avatar,
                    'content' => $request->content,
                ]));
                break;
            case 'group':
                Gateway::sendToGroup($request->room_id, json_encode([
                    'type' => 'group',
                    'uid' => $user->id,
                    'username' => $user->name,
                    'avatar' => $user->avatar,
                    'content' => $request->content,
                ]));
                break;
            
            case 'to':
                Gateway::sendToUid($request->user_id, json_encode([
                    'type' => 'to',
                    'uid' => $user->id,
                    'username' => $user->name,
                    'avatar' => $user->avatar,
                    'content' => $request->content,
                ]));
                break;
        }
    	
    	return $this->response->array(['message' => 'message send success !']);
    }


    public function room(Request $request)
    {
        $sessions = Gateway::getClientSessionsByGroup($request->room_id);
        $users_list = [];
        foreach ($sessions as $client_id => $value) {
            $users_list[$value['uid']] = $value['username'];
        }
        $new_message = ['type' => 'flash'];
        $new_message['user_list'] = $users_list;

        Gateway::sendToGroup($request->room_id, $new_message);

        return $this->response->array($new_message);
    }



}
