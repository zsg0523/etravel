<?php

/**
 * @Author: Eden
 * @Date:   2019-03-21 17:25:42
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-03-21 17:37:11
 */
namespace App\Transformers;

use App\Models\CHat;
use League\Fractal\TransformerAbstract;

class ChatTransformer extends TransformerAbstract
{
	public function transform(Chat $chat)
	{
		return [
			'id' => $chat->id,
			'user_id' => $chat->user_id,
			'to_id' => $chat->to_id,
			'type' => $chat->type,
			'content' => $chat->content,
			'image' => $chat->image,
			'crated_at' => $chat->created_at->toDateTimeString()
		];
	}

}