<?php

namespace App\Http\Controllers\Api;

use App\Models\Rule;
use App\Models\User;
use App\Models\Travel;
use App\Models\RuleCategory;
use Illuminate\Http\Request;
use App\Http\Requests\Api\RuleRequest;
use App\Transformers\RuleTransformer;
use App\Transformers\RuleCategoryTransformer;
use App\Transformers\ExamineTransformer;

class RulesController extends Controller
{
	/** [index 所有团队守则分类] */
    public function index()
    {
    	return $this->response->collection(RuleCategory::where('type', 10)->get(), new RuleCategoryTransformer(null));
    }

    /** [travelIndex 旅游团下所有分类] */
    public function travelIndex(Travel $travel)
    {
        return $this->response->collection($travel->rule_categories, new RuleCategoryTransformer(null));
    }

    /** [index 我的承诺] */
    public function promise(Travel $travel)
    {
        $promise = $travel->rule_categories()->where('type', 20)->get();

        return $this->response->collection($promise, new RuleCategoryTransformer(null));
    }

    /** [packages 行李清单] */
    public function packages(Travel $travel)
    {

        $packages = $travel->rule_categories()->where('type', 30)->get();

        return $this->response->collection($packages, new RuleCategoryTransformer($this->user()->id));
    }

    /** [show 守则详情] */
    public function show(Rule $rule)
    {
    	return $this->response->item($rule, new RuleTransformer(null));
    }

    /** [store 添加守则] */
    public function store(RuleRequest $request, Rule $rule)
    {
    	$rule->fill($request->all());
    	$rule->save();
    	return $this->response->item($rule, new RuleTransformer($this->user()->id))->setStatusCode(201);
    }


    /** [update 更新守则] */
    public function update(RuleRequest $request, Rule $rule)
    {
    	$rule->update($request->all());
    	return $this->response->item($rule, new RuleTransformer(null));
    }

    /** [destroy 删除守则] */
    public function destroy(Rule $rule)
    {
    	$rule->delete();
    	return $this->response->noContent();
    }	








}
