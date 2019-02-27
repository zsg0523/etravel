<?php

namespace App\Http\Controllers\Api;

use App\Models\WriteTitle;
use App\Models\Travel;
use Illuminate\Http\Request;
use App\Http\Requests\Api\WriteTitleRequest;
use App\Transformers\WriteTitleTransformer;

class WriteTitlesController extends Controller
{
    /** [index 所有感想标题] */
	public function index()
	{
		return $this->response->collection(WriteTitle::all(), new WriteTitleTransformer());
	}

    /** 旅游团下的所有感想标题 */
    public function travelIndex(Travel $travel)
    {
        return $this->response->collection($travel->write_titles, new WriteTitleTransformer());
    }

    /** [show 标题详情] */
	public function show(Travel $travel, WriteTitle $writetitle)
	{
		return $this->response->item($writetitle, new WriteTitleTransformer());
	}

    /** [store 创建标题] */
    public function store(WriteTitleRequest $request, Travel $travel, WriteTitle $writetitle)
    {
    	$writetitle->fill($request->all());
        $writetitle->travel_id = $travel->id;
    	$writetitle->save();

    	return $this->response->item($writetitle, new WriteTitleTransformer())->setStatusCode(201);
    }

    /** [update 更新标题] */
    public function update(WriteTitleRequest $request, Travel $travel, WriteTitle $writetitle)
    {
    	$writetitle->update($request->all());

    	return $this->response->item($writetitle, new WriteTitleTransformer());
    }

    /** [destroy 删除标题] */
    public function destroy(Travel $travel, WriteTitle $writetitle)
    {
    	$writetitle->delete();

    	return $this->response->noContent();
    }
}
