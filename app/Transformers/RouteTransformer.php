<?php

/**
 * @Author: Eden
 * @Date:   2018-12-13 16:35:28
 * @Last Modified by:   Eden
 * @Last Modified time: 2018-12-17 16:01:26
 */
namespace App\Transformers;

use App\Models\Route;
use League\Fractal\TransformerAbstract;

class RouteTransformer extends TransformerAbstract
{
	protected $availableIncludes = ['foods','sceneries','travel','studies'];

	public function transform(Route $route)
	{
		return [
			'id' => $route->id,
			'travel_id' => $route->travel_id,
			'day' => $route->day,
			'date' => $route->date,
			'description' => $route->description,
			'created_at' => $route->created_at->toDateTimeString(),
			'updated_at' => $route->updated_at->toDateTimeString(),
		];
	}

	public function includeSceneries(Route $route)
	{
		if($route->sceneries){
			return $this->collection($route->sceneries, new SceneryTransformer());
		}
	}
	
	public function includeFoods(Route $route)
	{
		if($route->foods){
			return $this->collection($route->foods, new FoodTransformer());
		}
	}

	public function includeTravel(Route $route)
	{
		return $this->item($route->travel, new TravelTransformer());
	}


	public function includeStudies(Route $route)
	{
		return $this->collection($route->studies, new StudyTransformer());
	}


}	