<?php

/**
 * @Author: Eden
 * @Date:   2018-12-13 16:50:28
 * @Last Modified by:   Eden
 * @Last Modified time: 2018-12-13 17:14:53
 */
namespace App\Transformers;

use App\Models\Scenery;
use League\Fractal\TransformerAbstract;

class SceneryTransformer extends TransformerAbstract
{
	public function transform(Scenery $scenery)
	{
		return [
			'id' => $scenery->id,
			'route_id' => $scenery->route_id,
			'time' => $scenery->time,
			'content' => $scenery->content,
			'description' => $scenery->description
		];
	}
}