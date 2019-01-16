<?php

namespace App\Http\Controllers\Api;

use App\Models\RuleCategory;
use App\Models\Travel;
use App\Http\Requests\Api\CategoryRequest;
use App\Transformers\RuleCategoryTransformer;
use App\Transformers\RuleCategoryTravelTransformer;

class RuleCategoriesController extends Controller
{
	/** [index 所有分类列表] */
    public function index()
    {
    	return $this->response->collection(RuleCategory::all(), new RuleCategoryTransformer(null));
    }

    /** [typeIndex 某分类下列表] */
    public function typeIndex(CategoryRequest $request)
    {
    	return $this->response->collection(RuleCategory::where('type',$request->type)->get(), new RuleCategoryTransformer(null));
    }

    /** [travelIndex 旅游团下的分类] */
    public function travelIndex(Travel $travel)
    {   
        return $this->response->collection($travel->rule_category_travels, new RuleCategoryTravelTransformer(null));
    }


    /** [store 创建分类] */
    public function store(CategoryRequest $request, RuleCategory $category)
    {
    	$category->fill($request->all());
    	$category->save();

    	return $this->response->item($category, new RuleCategoryTransformer(null));
    }


    /** [show 分类详情] */
    public function show( RuleCategory $category)
    {
    	return $this->response->item($category, new RuleCategoryTransformer(null));
    }

    /** [update 更新分类信息] */
    public function update(CategoryRequest $request, RuleCategory $category)
    {

    	$category->fill($request->all());
    	$category->update();

    	return $this->response->item($category, new RuleCategoryTransformer(null));
    }


    /** [delete 删除分类] */
    public function destroy(RuleCategory $category)
    {

    	$category->delete();

    	return $this->response->noContent();
    }





}
