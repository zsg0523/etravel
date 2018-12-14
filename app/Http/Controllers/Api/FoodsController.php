<?php

namespace App\Http\Controllers\Api;

use App\Models\Food;
use App\Models\Route;
use Illuminate\Http\Request;
use App\Transformers\FoodTransformer;
use App\Http\Requests\Api\FoodRequest;

class FoodsController extends Controller
{
    /** [index 所有行程膳食安排] */
    public function index()
    {
    	return $this->response->collection(Food::all(), new FoodTransformer());
    }

    /** [routeIndex 行程下膳食安排] */
    public function routeIndex(Route $route)
    {
    	return $this->response->collection($route->foods, new FoodTransformer());
    }

    /** [show 膳食安排详情] */
    public function show(Route $route, Food $food)
    {
    	if($route->id != $food->route_id) {
    		return $this->response->errorBadRequest();
    	}
    	return $this->response->item($food, new FoodTransformer());
    }

    /** [store 创建膳食安排] */
    public function store(FoodRequest $request, Route $route, Food $food)
    {
    	$food->fill($request->all());
    	$food->route_id = $route->id;
    	$food->save();

    	return $this->response->item($food, new FoodTransformer())->setStatusCode(201);

    }


    /** [update 更新膳食安排] */
    public function update(FoodRequest $request, Route $route, Food $food)
    {
    	if($route->id != $food->route_id) {
    		return $this->response->errorBadRequest();
    	}

    	$food->fill($request->all());
    	$food->update();
    	
		return $this->response->item($food, new FoodTransformer());
    }

    /** [destroy 删除膳食安排] */
    public function destroy(Route $route, Food $food)
    {
    	if($route->id != $food->route_id) {
    		return $this->response->errorBadRequest();
    	}

    	$food->delete();

    	return $this->response->noContent();
    }
}
