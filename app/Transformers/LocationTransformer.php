<?php

/**
 * @Author: Eden
 * @Date:   2018-12-05 10:11:20
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-04-11 18:36:07
 */
namespace App\Transformers;

use App\Models\Location;
use League\Fractal\TransformerAbstract;

class LocationTransformer extends TransformerAbstract
{
	public function transform(Location $location)
	{
		return [
			'id' => $location->id,
			'user_id' => $location->user_id,
			'coordinate' => $location->coordinate,
			'created_at' => $location->created_at->toDateTimeString(),
			'updated_at' => $location->updated_at->toDateTimeString(),
		];
	}
}