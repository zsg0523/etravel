<?php

/**
 * @Author: Eden
 * @Date:   2019-03-05 12:26:49
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-04-11 19:13:13
 */
namespace App\Observers;

use App\Models\User;
use App\Models\Travel;

class TravelObserver
{	
	/**
	 * [saved 扣除金币，每次创建项目扣除相应数量金币]
	 * @param  Travel $travel [description]
	 * @return [type]         [description]
	 */
	public function saved(Travel $travel)
	{
		$user = User::where('id', $travel->add_by)->first();

		if($user->tokens > 0) {

			$user->decrement('tokens', config('user.tokens'));

		}

	}

	/** [saving 默认项目背景图] */
	public function saving(Travel $travel)
	{
		if (empty($travel->image)) {
			$travel->image = 'https://iocaffcdn.phphub.org/uploads/images/201710/30/1/TrJS40Ey5k.png';
		}
	}

}