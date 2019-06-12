<?php

/**
 * @Author: Eden
 * @Date:   2019-03-05 12:26:49
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-06-11 17:57:52
 */
namespace App\Observers;

use App\Models\User;
use App\Models\Travel;

class TravelObserver
{	
	/**
	 * [created 扣除金币，每次创建项目扣除相应数量金币]
	 * @param  Travel $travel [description]
	 * @return [type]         [description]
	 */
	public function created(Travel $travel)
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
			$travel->image = 'http://120.77.206.79/etravel/public/uploads/images/travels/201904/12/1_1555059034_CNDm3c7vCL.png';
		}

		// 过滤富文本输入
		$travel->urgency = clean($travel->urgency, 'user_topic_body');
	}

}