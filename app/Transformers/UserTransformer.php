<?php

/**
 * @Author: Eden
 * @Date:   2018-12-03 18:57:23
 * @Last Modified by:   Eden
 * @Last Modified time: 2018-12-04 12:14:37
 */
namespace App\Transformers;

use App\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
	
	public function transform(User $user)
	{
		return [
			'id' => $user->id,
			'name' => $user->name,
			'email' => $user->email,
			'avatar' => $user->avatar,
			'introduction' => $user->introduction,
			'created_at' => $user->created_at->toDateTimeString(),
			'updated_at' => $user->updated_at->toDateTimeString(),
			'last_actived_at' => $user->last_actived_at,
		];
	}
}