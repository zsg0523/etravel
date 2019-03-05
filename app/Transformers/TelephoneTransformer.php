<?php

/**
 * @Author: Eden
 * @Date:   2018-12-04 17:22:30
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-03-05 16:51:45
 */
namespace App\Transformers;

use App\Models\Telephone;
use League\Fractal\TransformerAbstract;

class TelephoneTransformer extends TransformerAbstract
{
	public function transform(Telephone $telephone)
	{
		return [
			'id' => $telephone->id,
			'travel_id' => $telephone->travel_id,
			'name' => $telephone->name,
			'duty' => $telephone->duty,
			'phone' => $telephone->phone,
			'area_code' => $telephone->area_code,
			'created_at' => $telephone->created_at->toDateTimeString(),
			'updated_at' => $telephone->updated_at->toDateTimeString(),
		];
	}

}