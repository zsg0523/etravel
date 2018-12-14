<?php

namespace App\Http\Controllers\Api;

use App\Models\RuleCategory;
use App\Http\Requests\Api\CategoryRequest;
use App\Transformers\RuleCategoryTransformer;

class RuleCategoriesController extends Controller
{
	/** [index 所有分类列表] */
    public function index()
    {
    	return $this->response->collection(RuleCategory::all(), new RuleCategoryTransformer());
    }

    /** [typeIndex 某分类下列表] */
    public function typeIndex(CategoryRequest $request)
    {
    	return $this->response->collection(RuleCategory::where('type',$request->type)->get(), new RuleCategoryTransformer());
    }


    /** [store 创建分类] */
    public function store(CategoryRequest $request, RuleCategory $category)
    {
    	$category->fill($request->all());
    	$category->save();

    	return $this->response->item($category, new RuleCategoryTransformer());
    }


    /** [show 分类详情] */
    public function show(RuleCategory $category)
    {
    	return $this->response->item($category, new RuleCategoryTransformer());
    }

    /** [update 更新分类信息] */
    public function update(CategoryRequest $request, RuleCategory $category)
    {
    	$category->fill($request->all());
    	$category->update();

    	return $this->response->item($category, new RuleCategoryTransformer());
    }


    /** [delete 删除分类] */
    public function destroy(RuleCategory $category)
    {
    	$category->delete();

    	return $this->response->noContent();
    }





}
