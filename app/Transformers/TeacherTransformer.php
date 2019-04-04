<?php

/**
 * @Author: Eden
 * @Date:   2019-02-21 10:38:02
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-02-21 11:08:58
 */
namespace App\Transformer;

use App\Models\Teacher;
use League\Fractal\TransformerAbstract;

class TeacherTransformer extends TransformerAbstract
{
	protected $availableIncludes = ['school'];

	public function transform(Teacher $teacher)
	{
		return [
			'user_id' => $teacher->user_id,
			'school_id' => $teacher->school_id,
			'number' => $student->number,
			'title' => $student->title,
		];
	}

	public function includeSchool(Teacher $teacher)
	{
		if($teacher->school){
			return $this->item($teacher->school, new SchoolTransformer());
		}
	}

}