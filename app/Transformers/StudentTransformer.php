<?php

/**
 * @Author: Eden
 * @Date:   2018-12-10 22:07:43
 * @Last Modified by:   Eden
 * @Last Modified time: 2018-12-13 18:11:12
 */
namespace App\Transformers;

use App\Models\Student;
use League\Fractal\TransformerAbstract;

class StudentTransformer extends TransformerAbstract
{
	protected $availableIncludes = ['school'];

	public function transform(Student $student)
	{
		return [
			'user_id' => $student->user_id,
			'school_id' => $student->school_id,
			'student_number' => $student->student_number,
			'grade' => $student->grade,
			'class' => $student->class,
			'description' => $student->description
		];
	}

	public function includeSchool(Student $student)
	{
		if($student->school){
			return $this->item($student->school, new SchoolTransformer());
		}
	}


	
}
