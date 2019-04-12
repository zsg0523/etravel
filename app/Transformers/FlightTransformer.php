<?php

/**
 * @Author: Eden
 * @Date:   2018-12-11 15:35:03
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-04-12 10:20:53
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
			'from' => $flight->from,
			'from_flight' => $flight->from_flight,
			'to' => $flight->to,
			'to_flight' => $flight->to_flight,
			'flight' => $flight->flight,
			'takeoff_time' => $flight->takeoff_time,
			'arrival_time' => $flight->arrival_time,
			'is_return' => $flight->is_return,
		];
	}
}