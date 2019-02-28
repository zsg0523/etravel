<?php

/**
 * @Author: Eden
 * @Date:   2018-12-03 18:57:23
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-02-28 17:58:46
 */
namespace App\Transformers;

use App\Models\User;
use App\Models\Student;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{	
	protected $availableIncludes = ['student', 'schools'];

	public function transform(User $user)
	{
		return [
			'id' => $user->id,
			'name' => $user->name,
			'en_name' => $user->en_name,
			'sex' => $user->sex,
			'phone' => $user->phone,
			'email' => $user->email,
			'phone' => $user->phone,
			'avatar' => $user->avatar,
			'original_password' => $user->original_password,
			'manage_contents' => $user->can('manage_contents'),
			'introduction' => $user->introduction,
			'created_at' => $user->created_at->toDateTimeString(),
			'updated_at' => $user->updated_at->toDateTimeString(),
			'last_actived_at' => $user->last_actived_at->diffForHumans(),
		];
	}

	/** [includeStudent 获取学生信息] */
	public function includeStudent(User $user)
	{
		if ($user->student) {
			return $this->item($user->student, new StudentTransformer());
		}
	}

	public function includeSchools(User $user)
	{
		if ($user->schools) {
			return $this->collection($user->schools, new SchoolTransformer());
		}
	}

	
}