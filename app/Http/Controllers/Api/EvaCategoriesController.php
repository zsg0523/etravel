<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Travel;
use App\Models\EvaluationCategory;
use App\Transformers\EvaCategoryTransformer;
use App\Http\Requests\Api\EvaluationCategoryRequest;

class EvaCategoriesController extends Controller
{
    /** [index 所有旅游评估分类列表] */
    public function index()
    {
    	return $this->response->collection(EvaluationCategory::all(), new EvaCategoryTransformer(null));
    }

    /** [travelIndex 旅游下分类列表] */
    public function travelIndex(Travel $travel)
    {
    	return $this->response->collection($travel->evaluation_categories, new EvaCategoryTransformer($this->user()->id));
    }

    /** [show 旅游下评估详情] */
    public function show(EvaluationCategory $category)
    {
    	return $this->response->item($category, new EvaCategoryTransformer($this->user()->id));
    }

    /** [store 创建评估分类] */
    public function store(EvaluationCategoryRequest $request, Travel $travel, EvaluationCategory $category)
    {
    	$category->fill($request->all());
    	$category->travel_id = $travel->id;
    	$category->save();

    	return $this->response->item($category, new EvaCategoryTransformer(null))->setStatusCode(201);
    }

    /** [update 更新评估分类] */
    public function update(EvaluationCategoryRequest $request, Travel $travel, EvaluationCategory $category)
    {
    	if($category->travel_id != $travel->id) {
    		return $this->response->errorBadRequest();
    	}

    	$category->fill($request->all());
    	$category->update();

    	return $this->response->item($category, new EvaCategoryTransformer(null));
    }

    /** [destroy 删除评估分类] */
    public function destroy(Travel $travel, EvaluationCategory $category)
    {
    	if($category->travel_id != $travel->id){
    		return $this->response->errorBadRequest();
    	}

    	$category->delete();

    	return $this->response->noContent();
    }














}
