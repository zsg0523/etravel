<?php

namespace App\Http\Controllers\Api;

use App\Models\Assembly;
use App\Models\Travel;
use Illuminate\Http\Request;
use App\Http\Requests\Api\LeaderRequest;
use App\Transformers\AssemblyTransformer;

class LeadersController extends Controller
{
	/** [index 领队列表] */
    public function index()
    {
    	return $this->response->collection(Assembly::all(), new AssemblyTransformer());
    }

    /** [show 领队详情] */
    public function show(Travel $travel, Assembly $assembly)
    {
    	if ($travel->id != $assembly->travel_id) {
    		return $this->response->errorBadRequest();
    	}

    	return $this->response->item($assembly, new AssemblyTransformer());
    }

    /** [store 创建领队老师] */
    public function store(LeaderRequest $request, Travel $travel, Assembly $assembly)
    {
    	$assembly->fill($request->all());
    	$assembly->travel_id = $travel->id;
    	$assembly->save();

    	return $this->response->item($assembly, new AssemblyTransformer())->setStatusCode(201);
    }

    /** [update 更新领队老师] */
    public function update(LeaderRequest $request, Travel $travel, Assembly $assembly)
    {
    	if ($travel->id != $assembly->travel_id) {
    		return $this->response->errorBadRequest();
    	}

    	$assembly->fill($request->all());
    	$assembly->update();

    	return $this->response->item($assembly, new AssemblyTransformer());
    }

    /** [destroy 删除领队老师] */
   	public function destroy(Travel $travel, Assembly $assembly)
   	{
   		if ($travel->id != $assembly->travel_id) {
    		return $this->response->errorBadRequest();
    	}

    	$assembly->delete();

    	return $this->response->noContent();
   	}

}
