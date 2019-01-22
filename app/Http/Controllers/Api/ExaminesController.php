<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Rule;
use App\Models\Examine;
use Illuminate\Http\Request;
use App\Http\Requests\Api\ExamineRequest;
use App\Transformers\ExamineTransformer;

class ExaminesController extends Controller
{
	/** [store 检查行李清单] */
    public function store(ExamineRequest $request, User $user, Rule $rule, Examine $examine)
    {
    	$examine->fill($request->all());
    	$examine->user_id = $user->id;
    	$examine->rule_id = $rule->id;
    	$examine->save();

    	return $this->response->item($examine, new ExamineTransformer())->setStatusCode(201);
    }

    /** [update 更新行李清单] */
    public function update(ExamineRequest $request, User $user, Rule $rule, Examine $examine)
    {
    	$examine->fill($request->all());
    	$examine->update();

    	return $this->response->item($examine, new ExamineTransformer());
    }

    /** [destroy 删除行李清单] */
    public function destroy(Examine $examine)
    {
        $examine->delete();
        return $this->response->noContent();
    }









}
