<?php

namespace App\Http\Controllers\Api;

use App\Models\Study;
use App\Models\Route;
use App\Models\Travel;
use Illuminate\Http\Request;
use App\Http\Requests\Api\StudyRequest;
use App\Transformers\StudyTransformer;

class StudiesController extends Controller
{
    public function index()
    {
    	return $this->response->collection(Study::all(), new StudyTransformer(null));
    }

    /** [routeIndex 行程下所有学习工作纸] */
    public function routeIndex(Route $route)
    {
    	return $this->response->collection($route->studies, new StudyTransformer($this->user()->id));
    }

    /** [travelIndex 旅游下所有学习工作纸] */
    public function travelIndex(Travel $travel)
    {
        return $this->response->collection($travel->studies, new StudyTransformer(null));
    }


    /** [show 工作纸详情] */
    public function show(Route $route, Study $study)
    {
    	if($route->id != $study->route_id) {
    		return $this->response->errorBadRequest();
    	}

    	return $this->response->item($study, new StudyTransformer($this->user()->id));
    }


    public function store(StudyRequest $request, Route $route, Study $study)
    {
    	$study->fill($request->all());
    	$study->route_id = $route->id;
    	$study->save();

    	return $this->response->item($study, new StudyTransformer(null))->setStatusCode(201);
    }

    public function update(StudyRequest $request, Route $route, Study $study)
    {
    	if($route->id != $study->route_id) {
    		return $this->response->errorBadRequest();
    	}

    	$study->fill($request->all());
    	$study->update();

    	return $this->response->item($study, new StudyTransformer(null));
    }

    public function destroy(Route $route, Study $study)
    {
    	if($route->id != $study->route_id) {
    		return $this->response->errorBadRequest();
    	}

    	$study->delete();
    	return $this->response->noContent();
    }









}
