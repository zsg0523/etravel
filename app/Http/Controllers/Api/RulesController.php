<?php

namespace App\Http\Controllers\Api;

use App\Models\Rule;
use App\Models\User;
use App\Models\Group;
use App\Models\RuleCategory;
use Illuminate\Http\Request;
use App\Http\Requests\Api\RuleRequest;
use App\Transformers\RuleTransformer;
use App\Transformers\RuleCategoryTransformer;
use App\Transformers\ExamineTransformer;

class RulesController extends Controller
{
	/** [index 团队守则分类列表] */
    public function index()
    {
    	return $this->response->collection(RuleCategory::where('type', 10)->get(), new RuleCategoryTransformer());
    }

    /** [index 我的承诺] */
    public function promise()
    {
        return $this->response->collection(RuleCategory::where('type', 20)->get(), new RuleCategoryTransformer());
    }

    public function show(Rule $rule)
    {
    	return $this->response->item($rule, new RuleTransformer());
    }

    public function store(RuleRequest $request, Rule $rule)
    {
    	$rule->fill($request->all());
    	$rule->save();
    	return $this->response->item($rule, new RuleTransformer())->setStatusCode(201);
    }


    public function update(RuleRequest $request, Rule $rule)
    {
    	$rule->update($request->all());
    	return $this->response->item($rule, new RuleTransformer());
    }

    public function destroy(Rule $rule)
    {
    	$rule->delete();
    	return $this->response->noContent();
    }	








}
