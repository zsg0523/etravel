<?php

/**
 * @Author: Eden
 * @Date:   2019-03-05 12:26:49
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-03-05 15:49:59
 */
namespace App\Observers;

use App\Models\User;
use App\Models\Travel;

class TravelObserver
{
	public function saved(Travel $travel)
	{
		$user = User::where('id', $travel->add_by)->first();

		if($user->tokens > 0) {

			$user->decrement('tokens', config('user.tokens'));

		}

	}
}