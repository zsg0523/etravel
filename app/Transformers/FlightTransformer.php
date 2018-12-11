<?php

/**
 * @Author: Eden
 * @Date:   2018-12-11 15:35:03
 * @Last Modified by:   Eden
 * @Last Modified time: 2018-12-11 16:06:57
 */
namespace App\Transformers;

use App\Models\Flight;
use League\Fractal\TransformerAbstract;

class FlightTransformer extends TransformerAbstract
{
	public function transform(Flight $flight)
	{
		return [
			'id' => $flight->id,
			'date' => $flight->date,
			'site' => $flight->site,
			'flight' => $flight->flight,
			'takeoff_time' => $flight->takeoff_time,
			'arrival_time' => $flight->arrival_time,
			'is_return' => $flight->is_return ? '返程航班' : '前往航班',
		];
	}
}