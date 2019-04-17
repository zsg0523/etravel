<?php

/**
 * @Author: Eden
 * @Date:   2018-12-10 11:32:32
 * @Last Modified by:   Eden
 * @Last Modified time: 2018-12-29 17:57:54
 */
namespace App\Transformers;

use App\Models\Assembly;
use League\Fractal\TransformerAbstract;

class AssemblyTransformer extends TransformerAbstract
{

	public function transform(Assembly $assembly)
	{
		return [
			'id' => $assembly->id,
			'travel_id' => $assembly->travel_id,
			'leader' => $assembly->leader,
			'duty' => $assembly->duty,
			'phone' => $assembly->phone,
			'area_code' => $assembly->area_code,
		];
	}
}