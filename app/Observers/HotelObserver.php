<?php

/**
 * @Author: Eden
 * @Date:   2019-01-24 15:42:27
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-01-24 16:05:49
 */
namespace App\Observers;

use App\Models\Hotel;

class HotelObserver
{
	public function saving(Hotel $hotel)
	{
		if (empty($hotel->image)) {
			$hotel->image = 'https://iocaffcdn.phphub.org/uploads/images/201710/30/1/TrJS40Ey5k.png';
		}
	}

}