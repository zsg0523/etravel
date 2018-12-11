<?php

/**
 * @Author: Eden
 * @Date:   2018-12-10 22:27:59
 * @Last Modified by:   Eden
 * @Last Modified time: 2018-12-10 22:30:35
 */
namespace App\Transformers;

use App\Models\School;
use League\Fractal\TransformerAbstract;

class SchoolTransformer extends TransformerAbstract
{
	public function transform(School $school)
	{
		return [
			'id' => $school->id,
			'school_name' => $school->school_name,
			'school_address' => $school->school_address
		];
	}
}