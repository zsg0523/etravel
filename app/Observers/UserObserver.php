<?php

/**
 * @Author: Eden
 * @Date:   2019-01-12 17:56:24
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-01-18 18:19:03
 */
namespace App\Observers;

use App\Models\User;

class UserObserver
{
	public function saving(User $user)
	{
		if (empty($user->avatar)) {
			$user->avatar = 'https://iocaffcdn.phphub.org/uploads/images/201710/30/1/TrJS40Ey5k.png';
		}
	}
}