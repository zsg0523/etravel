<?php

/**
 * @Author: Eden
 * @Date:   2019-01-18 16:05:58
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-03-13 12:07:37
 */
namespace App\Observers;

use App\Models\User;
use App\Models\Write;
use App\Notifications\InvoiceWrited;

class WriteObserver
{
	public function created(Write $write)
	{	
		// 管理员
		$user = User::find(1);
		// 通知管理员,学生提交了感想
		$user->notify(new InvoiceWrited($write));
	}

}
