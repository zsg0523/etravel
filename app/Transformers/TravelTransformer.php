<?php

/**
 * @Author: Eden
 * @Date:   2018-12-05 10:11:20
 * @Last Modified by:   Eden
 * @Last Modified time: 2018-12-28 18:54:06
 */
namespace App\Transformers;

use App\Models\Travel;
use League\Fractal\TransformerAbstract;

class TravelTransformer extends TransformerAbstract
{
	protected $availableIncludes = ['assembly','flight','hotel','groups','routes'];

	public function transform(Travel $travel)
	{
		return [
			'id' => $travel->id,
			'travel_name' => $travel->travel_name,
			'introduction' => $travel->travel_introduction,
			'travel_at' => $travel->travel_at,
			'created_at' => $travel->created_at->toDateTimeString(),
			'updated_at' => $travel->updated_at->toDateTimeString(),
			'pivot' => [
				'duty' => isset($travel->pivot->duty) ? $travel->pivot->duty : '',
				'is_promise' => isset($travel->pivot->is_promise) ? $travel->pivot->is_promise : '',
				'group' => isset($travel->pivot->group) ? $travel->pivot->group : '',
				'room' => isset($travel->pivot->room) ? $travel->pivot->room : '',
			],
		];
	}

	public function includeAssembly(Travel $travel)
	{
		if($travel->assembly) {
			return $this->item($travel->assembly, new AssemblyTransformer());
		}
	}


	public function includeFlight(Travel $travel)
	{
		if($travel->flight){
			return $this->collection($travel->flight, new FlightTransformer());
		}
	}

	public function includeHotel(Travel $travel)
	{
		if($travel->hotel){
			return $this->collection($travel->hotel, new HotelTransformer());
		}
	}

	public function includeGroups(Travel $travel)
	{
		if($travel->groups){
			return $this->collection($travel->groups, new GroupTransformer());
		}
	}

	public function includeRoutes(Travel $travel)
	{
		if($travel->routes){
			return $this->collection($travel->routes, new RouteTransformer());
		}
	}

}