<?php

namespace App\Http\Controllers\Api;

use App\Models\Scenery;
use App\Models\Route;
use Illuminate\Http\Request;
use App\Transformers\SceneryTransformer;
use App\Http\Requests\Api\SceneryRequest;

class SceneriesController extends Controller
{
	/** [index 所有行程景点安排] */
    public function index()
    {
    	return $this->response->collection(Scenery::all(), new SceneryTransformer());
    }

    /** [routeIndex 行程下景点安排] */
    public function routeIndex(Route $route)
    {
    	return $this->response->collection($route->sceneries, new SceneryTransformer());
    }

    /** [show 景点安排详情] */
    public function show(Route $route, Scenery $scenery)
    {
    	if($route->id != $scenery->route_id) {
    		return $this->response->errorBadRequest();
    	}
    	return $this->response->item($scenery, new SceneryTransformer());
    }

    /** [store 创建景点安排] */
    public function store(SceneryRequest $request, Route $route, Scenery $scenery)
    {
    	$scenery->fill($request->all());
    	$scenery->route_id = $route->id;
    	$scenery->save();

    	return $this->response->item($scenery, new SceneryTransformer())->setStatusCode(201);

    }


    /** [update 更新景点安排] */
    public function update(SceneryRequest $request, Route $route, Scenery $scenery)
    {
    	if($route->id != $scenery->route_id) {
    		return $this->response->errorBadRequest();
    	}

    	$scenery->fill($request->all());
    	$scenery->update();
    	
		return $this->response->item($scenery, new SceneryTransformer());
    }

    /** [destroy 删除景点安排] */
    public function destroy(Route $route, Scenery $scenery)
    {
    	if($route->id != $scenery->route_id) {
    		return $this->response->errorBadRequest();
    	}

    	$scenery->delete();

    	return $this->response->noContent();
    }








}
