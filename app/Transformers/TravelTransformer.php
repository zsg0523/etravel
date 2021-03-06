<?php

/**
 * @Author: Eden
 * @Date:   2018-12-05 10:11:20
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-05-22 16:13:27
 */
namespace App\Transformers;

use App\Models\Travel;
use League\Fractal\TransformerAbstract;

class TravelTransformer extends TransformerAbstract
{
	protected $availableIncludes = ['assemblies','flight','hotel','groups','routes', 'location'];

	public function transform(Travel $travel)
	{
		return [
			'id' => $travel->id,
			'travel_name' => $travel->travel_name,
			'school_name' => $travel->school_name,
			'image' => $travel->image,
			'travel_introduction' => $travel->travel_introduction,
			'travel_at' => $travel->travel_at,
			'travel_return' => $travel->travel_return,
			'assembly_at' => $travel->assembly_at,
			'assembly_station' => $travel->assembly_station,
			'dissolution_at' => $travel->dissolution_at,
			'dissolution_station' => $travel->dissolution_station,
			'add_by' => $travel->add_by,
			'urgency' => $travel->urgency,
			'view_plan' => $travel->view_plan,
			'meal_plan' => $travel->meal_plan,
			'travel_status' => $travel->travel_status,
			'code_one' => isset($travel->emergency) ? ($travel->emergency->code_one ?? '') : '',
			'code_two' => isset($travel->emergency) ? ($travel->emergency->code_two ?? '') : '',
			'emergency_phone_one' => isset($travel->emergency) ? $travel->emergency->emergency_phone_one : '',
			'emergency_phone_two' => isset($travel->emergency) ? $travel->emergency->emergency_phone_two : '',
			'emergency_email_one' => isset($travel->emergency) ? $travel->emergency->emergency_email_one : '',
			'emergency_email_two' => isset($travel->emergency) ? $travel->emergency->emergency_email_two : '',
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

	public function includeAssemblies(Travel $travel)
	{
		if($travel->assemblies) {
			return $this->collection($travel->assemblies, new AssemblyTransformer());
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