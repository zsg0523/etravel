<?php

namespace App\Http\Controllers\Api;

use App\Models\Write;
use App\Models\User;
use App\Models\Travel;
use App\Models\WriteTitle;
use Illuminate\Http\Request;
use App\Http\Requests\Api\WriteRequest;
use App\Transformers\WriteTransformer;

class WritesController extends Controller
{

	/** [index 总结列表] */
    public function index()
    {
    	return $this->response->collection(Write::all(), new WriteTransformer());
    }

    /** [userIndex 用户所有总结] */
    public function userIndex(User $user)
    {
    	return $this->response->collection($user->summaries, new WriteTransformer());
    }


    /** [travelIndex 旅游内所有用户总结] */
    public function travelIndex(Travel $travel)
    {
    	return $this->response->collection($travel->summaries, new WriteTransformer());
    }

    public function show(User $user, Travel $travel, Write $title)
    {
        return $this->response->item($user->summaries()->where('travel_id', $travel->id)->where('write_title_id', $title->id)->get(), new WriteTransformer());
    }

    /** [store 增加感想] */
    public function store(WriteRequest $request, User $user, Travel $travel, WriteTitle $title, Write $write)
    {
    	$write->fill($request->all());
    	$write->write_title_id = $title->id;
    	$write->user_id = $user->id;
    	$write->travel_id = $user->id;
    	$write->save();

    	return $this->response->item($write, new WriteTransformer())->setStatusCode(201);
    }

    /** [update 更新感想] */
    public function update(WriteRequest $request, User $user, Travel $travel, WriteTitle $title, Write $write)
    {
    	if ($write->user_id != $user->id || $write->travel_id != $travel->id || $write->write_title_id != $title->id) {
    		return $this->response->errorBadRequest();
    	}
    	$write->update($request->all());

    	return $this->response->item($write, new WriteTransformer());
    }

    /** [destroy 删除感想] */
    public function destroy(WriteRequest $request, User $user, Travel $travel, WriteTitle $title, Write $write)
    {
    	if ($write->user_id != $user->id || $write->travel_id != $travel->id || $write->write_title_id != $title->id) {
    		return $this->response->errorBadRequest();
    	}

    	$write->delete();

    	return $this->response->noContent();
    }	






















}
