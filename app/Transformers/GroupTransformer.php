<?php

/**
 * @Author: Eden
 * @Date:   2018-12-12 17:04:12
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-02-18 16:47:32
 */
namespace App\Transformers;

use App\Models\Group;
use League\Fractal\TransformerAbstract;

class GroupTransformer extends TransformerAbstract
{
	protected $availableIncludes = ['user','travel'];

	public function transform(Group $group)
	{
		return [
			'id' => $group->id,
			'user_id' => $group->user_id,
			'travel_id' => $group->travel_id,
			'student_number' => $group->student_number,
			'class' => $group->class,
			'duty' => $group->duty,
			'room' => $group->room,
			'group' => $group->group,
			'is_promise' => $group->is_promise,
			'created_at' => $group->created_at->toDateTimeString(),
			'updated_at' => $group->updated_at->toDateTimeString(),
 		];
	}


	public function includeUser(Group $group)
	{
		if($group->user){
			return $this->item($group->user, new UserTransformer());
		}
	}

	public function includeTravel(Group $group)
	{
		if($group->travel){
			return $this->item($group->travel, new TravelTransformer());
		}
	}
}