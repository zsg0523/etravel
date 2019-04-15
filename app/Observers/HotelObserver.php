<?php

/**
 * @Author: Eden
 * @Date:   2019-01-24 15:42:27
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-04-12 15:32:44
 */
namespace App\Observers;

use App\Models\Hotel;

class HotelObserver
{
	public function saving(Hotel $hotel)
	{
		if (empty($hotel->image)) {
			$hotel->image = 'http://120.77.206.79/etravel/public/uploads/images/travels/201904/12/1_1555054305_j8Qwecy5fN.png';
		}
	}

}