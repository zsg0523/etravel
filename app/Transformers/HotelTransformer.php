<?php

/**
 * @Author: Eden
 * @Date:   2018-12-11 18:22:05
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-04-12 11:31:59
 */
namespace App\Transformers;

use App\Models\Hotel;
use League\Fractal\TransformerAbstract;

class HotelTransformer extends TransformerAbstract
{
	public function transform(Hotel $hotel)
	{
		return [
			'id' => $hotel->id,
			'hotel_name' => $hotel->hotel_name,
			'hotel_address' => $hotel->hotel_address,
			'check_at' => $hotel->check_at,
			'leave_at' => $hotel->leave_at,
			'times' => $hotel->times,
			'image' => $hotel->image,
			'hotel_phone' => $hotel->hotel_phone,
			'created_at' => $hotel->created_at->toDateTimeString(),
			'updated_at' => $hotel->updated_at->toDateTimeString(),
		];
	}
}