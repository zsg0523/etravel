<?php

namespace App\Http\Controllers\Api;

use App\Models\Route;
use App\Models\Travel;
use Illuminate\Http\Request;
use App\Http\Requests\Api\RouteRequest;
use App\Transformers\RouteTransformer;

class RoutesController extends Controller
{
	/** [index 所有行程安排] */
    public function index()
    {
    	return $this->response->collection(Route::all(), new RouteTransformer());
    }

    /** [travelIndex 旅游团内所有行程安排] */
    public function travelIndex(Travel $travel)
    {
    	return $this->response->collection($travel->routes, new RouteTransformer());
    }

    /** [show 行程安排详情] */
    public function show(Travel $travel, Route $route)
    {
    	if ($travel->id != $route->travel_id) {
    		return $this->response->errorBadRequest();
    	}

    	return $this->response->item($route, new RouteTransformer());
    }

    /** [store 创建行程] */
    public function store(RouteRequest $request, Travel $travel, Route $route)
    {
    	$route->fill($request->all());
    	$route->travel_id = $travel->id;
    	$route->save();

    	return $this->response->item($route, new RouteTransformer())->setStatusCode(201);
    }

    /** [update 更新行程] */
    public function update(RouteRequest $request, Travel $travel, Route $route)
    {
    	if ($travel->id != $route->travel_id) {
    		return $this->response->errorBadRequest();
    	}
    	
    	$route->fill($request->all());
    	$route->travel_id = $travel->id;
    	$route->update();

    	return $this->response->item($route, new RouteTransformer());
    }

    /** [destroy 删除行程] */
    public function destroy(Travel $travel, Route $route)
    {
    	if ($travel->id != $route->travel_id) {
    		return $this->response->errorBadRequest();
    	}

    	$route->delete();
    	return $this->response->noContent();
    }
}
