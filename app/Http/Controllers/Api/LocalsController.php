<?php

namespace App\Http\Controllers\Api;

use App\Models\Travel;
use App\Models\Local;
use Illuminate\Http\Request;
use App\Http\Requests\Api\LocalRequest;
use App\Transformers\LocalTransformer;

class LocalsController extends Controller
{	
	/** [index 当地文化列表] */
    public function index()
    {
    	return $this->response->collection(Local::all(), new LocalTransformer());
    }


    /** [travelIndex 旅游下当地文化列表] */
    public function travelIndex(Travel $travel)
    {
    	return $this->response->collection($travel->locals, new LocalTransformer());
    }

    /** [show 当地文化详情] */
    public function show(Local $local)
    {
    	return $this->response->item($local, new LocalTransformer());
    }

    /** [store 创建当地文化] */
    public function store(LocalRequest $request, Travel $travel, Local $local)
    {
    	$local->fill($request->all());
    	$local->travel_id = $travel->id;
    	$local->save();

    	return $this->response->item($local, new LocalTransformer())->setStatusCode(201);
    }


    /** [update 更新当地文化] */
    public function update(LocalRequest $request, Travel $travel, Local $local)
    {
    	if ($local->travel_id != $travel->id) {
    		return $this->response->errorBadRequest();
    	}

    	$local->fill($request->all());
    	$local->update();

    	return $this->response->item($local, new LocalTransformer());
    }

    /** [destroy 删除当地文化] */
    public function destroy(Travel $travel, Local $local)
    {
    	if ($local->travel_id != $travel->id) {
    		return $this->response->errorBadRequest();
    	}

    	$local->delete();

    	return $this->response->noContent();
    }



}


