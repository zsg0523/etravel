<?php

namespace App\Http\Controllers\Api;

use App\Models\Write;
use App\Models\User;
use App\Models\Travel;
use App\Models\Image;
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
    
    /** [show 用户单篇感想] */
    public function show(User $user, Travel $travel, WriteTitle $title)
    {
        return $this->response->item($user->summaries()->where('travel_id', $travel->id)->where('write_title_id', $title->id)->firstOrFail(), new WriteTransformer());
    }

    /** [store 增加感想] */
    public function store(WriteRequest $request, Travel $travel, WriteTitle $title, Write $write)
    {   
        if (isset($request->travel_image_id)) {

            $image = Image::find($request->travel_image_id);

            $image_path = $image->path;
        } else {
            $image_path = "";
        }
        
        if (isset($request->content)) {
            // 更新现有模型，如果不存在则创建
            $write = $write->updateOrCreate(
                ['user_id' => $this->user()->id, 'travel_id' => $travel->id, 'write_title_id'=>$title->id],
                ['content' => $request->content, 'image' => $image_path, 'image_id' => $request->travel_image_id]
            );
        } else {
            // 更新现有模型，如果不存在则创建
            $write = $write->updateOrCreate(
                ['user_id' => $this->user()->id, 'travel_id' => $travel->id, 'write_title_id'=>$title->id],
                ['image' => $image_path, 'image_id' => $request->travel_image_id]
            );
        }
    	return $this->response->item($write, new WriteTransformer())->setStatusCode(201);
    }

    /** [update 更新感想] */
    public function update(WriteRequest $request, Travel $travel, WriteTitle $title, Write $write)
    {
    	if ($write->travel_id != $travel->id || $write->write_title_id != $title->id) {
    		return $this->response->errorBadRequest();
    	}

        // 当前访问用户是否有权更新
        $this->authorize('update', $write);

    	$write->update($request->all());

    	return $this->response->item($write, new WriteTransformer());
    }

    /** [destroy 删除感想] */
    public function destroy(Travel $travel, WriteTitle $title, Write $write)
    {
    	if ($write->travel_id != $travel->id || $write->write_title_id != $title->id) {
    		return $this->response->errorBadRequest();
    	}

        $this->authorize('delete', $write);

    	$write->delete();

    	return $this->response->noContent();
    }	






















}
