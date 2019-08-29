<?php

/**
 * @Author: Eden
 * @Date:   2019-01-24 15:42:27
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-08-29 16:56:27
 */
namespace App\Observers;

use App\Models\Hotel;

class HotelObserver
{
	public function saving(Hotel $hotel)
	{
		if (empty($hotel->image)) {
			$hotel->image = 'http://app.study2go.net/etravel/public/uploads/images/travels/201908/29/1_1567068894_KtGqT1jriX.png';
		}
	}

}