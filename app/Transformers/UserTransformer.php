<?php

/**
 * @Author: Eden
 * @Date:   2018-12-03 18:57:23
 * @Last Modified by:   Eden
 * @Last Modified time: 2018-12-26 17:18:39
 */
namespace App\Transformers;

use App\Models\User;
use App\Models\Student;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{	
	protected $availableIncludes = ['student'];

	public function transform(User $user)
	{
		return [
			'id' => $user->id,
			'name' => $user->name,
			'phone' => $user->phone,
			'email' => $user->email,
			'avatar' => $user->avatar,
			'introduction' => $user->introduction,
			'created_at' => $user->created_at->toDateTimeString(),
			'updated_at' => $user->updated_at->toDateTimeString(),
			'last_actived_at' => $user->last_actived_at,
		];
	}

	/** [includeStudent 获取学生信息] */
	public function includeStudent(User $user)
	{
		return $this->item($user->student, new StudentTransformer());
	}

	
}