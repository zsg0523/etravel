<?php

/**
 * @Author: Eden
 * @Date:   2019-03-19 17:56:06
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-03-19 18:31:19
 */
namespace App\Observers;

use App\Models\Chat;
use App\Models\User;
use App\Notifications\ChatOnLine;

class ChatObserver
{
	public function saved(Chat $chat)
	{
		if ($chat->type = "to") {
			// 接受消息用户
			$user = User::find($chat->to_id);
		}
		// 通知接收用户有私聊信息
		$user->notify(new ChatOnLine($chat));	
	}
} 