<?php

/**
 * @Author: Eden
 * @Date:   2018-12-11 18:22:05
 * @Last Modified by:   Eden
 * @Last Modified time: 2018-12-11 18:25:36
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
			'hotel_date' => $hotel->hotel_date,
			'hotel_phone' => $hotel->hotel_phone,
			'created_at' => $hotel->created_at->toDateTimeString(),
			'updated_at' => $hotel->updated_at->toDateTimeString(),
		];
	}
}