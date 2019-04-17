<?php

/**
 * @Author: Eden
 * @Date:   2019-03-21 17:25:42
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-03-21 18:33:56
 */
namespace App\Transformers;

use App\Models\CHat;
use League\Fractal\TransformerAbstract;

class ChatTransformer extends TransformerAbstract
{
	protected $availableIncludes = ['user'];

	public function transform(Chat $chat)
	{	
		return [
			'id' => $chat->id,
			'user_id' => $chat->user_id,
			'to_id' => $chat->to_id,
			'type' => $chat->type,
			'content' => $chat->content,
			'image' => $chat->image,
			'crated_at' => $chat->created_at->toDateTimeString(),
			'name' => $chat->user->name,
			'avatar' => $chat->user->avatar
		];
	}

	public function includeUser(Chat $chat)
	{
		return $this->item($chat->user, new UserTransformer());
	}

}