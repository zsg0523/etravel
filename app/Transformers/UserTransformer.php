<?php

/**
 * @Author: Eden
 * @Date:   2018-12-03 18:57:23
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-03-05 12:44:31
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
			'code' => $user->code,
			'phone' => $user->phone,
			'email' => $user->email,
			'phone' => $user->phone,
			'avatar' => $user->avatar,
			'tokens' => $user->tokens,
			'original_password' => $user->original_password,
			'manage_contents' => $user->can('manage_contents'),
			'introduction' => $user->introduction,
			'code_one' => isset($user->emergency->code_one) ? $user->emergency->code_one : '',
			'code_two' => isset($user->emergency->code_two) ? $user->emergency->code_two : '',
			'emergency_phone_one' => isset($user->emergency->emergency_phone_one) ? $user->emergency->emergency_phone_one : '',
			'emergency_phone_two' => isset($user->emergency->emergency_phone_two) ? $user->emergency->emergency_phone_two : '',
			'emergency_email_one' => isset($user->emergency->emergency_email_one) ? $user->emergency->emergency_email_one : '',
			'emergency_email_two' => isset($user->emergency->emergency_email_two) ? $user->emergency->emergency_email_two : '',
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