<?php

namespace App\Http\Controllers\Api;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Requests\Api\NewRequest;
use App\Transformers\NewTransformer;

class NewsController extends Controller
{
	/** [index 新闻列表] */
    public function index()
    {
    	return $this->response->collection(News::all(), new NewTransformer());
    }

    /** [show 新闻详情] */
    public function show(News $new)
    {
    	return $this->response->item($new, new NewTransformer());
    }

    /** [store 编辑新闻] */
    public function store(NewRequest $request, News $new)
    {
    	$new->fill($request->all());
    	$new->save();
    	return $this->response->item($new, new NewTransformer())->setStatusCode(201);
    }

    /** [update 更新新闻] */
    public function update(NewRequest $request, News $new)
    {
    	$new->update($request->all());
    	return $this->response->item($new, new NewTransformer());
    }

    /** [destroy 删除新闻	] */
    public function destroy(News $new)
    {
    	$new->delete();
    	return $this->response->noContent();
    }


}
