<?php

/**
 * @Author: Eden
 * @Date:   2018-12-05 10:11:20
 * @Last Modified by:   Eden
 * @Last Modified time: 2018-12-12 17:11:33
 */
namespace App\Transformers;

use App\Models\Travel;
use League\Fractal\TransformerAbstract;

class TravelTransformer extends TransformerAbstract
{
	protected $availableIncludes = ['assembly','flight','hotel','group'];

	public function transform(Travel $travel)
	{
		return [
			'id' => $travel->id,
			'travel_name' => $travel->travel_name,
			'introduction' => $travel->travel_introduction,
			'travel_at' => $travel->travel_at,
			'created_at' => $travel->created_at->toDateTimeString(),
			'updated_at' => $travel->updated_at->toDateTimeString(),
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

	public function includeGroup(Travel $travel)
	{
		if($travel->group){
			return $this->collection($travel->group, new GroupTransformer());
		}
	}

}