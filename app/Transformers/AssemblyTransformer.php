<?php

/**
 * @Author: Eden
 * @Date:   2018-12-10 11:32:32
 * @Last Modified by:   Eden
 * @Last Modified time: 2018-12-10 15:37:58
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
			'assembly_station' => $assembly->assembly_station,
			'assembly_at' => $assembly->assembly_at,
			'dissolution_at' => $assembly->dissolution_at
		];
	}
}