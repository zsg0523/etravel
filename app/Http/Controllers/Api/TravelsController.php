<?php

namespace App\Http\Controllers\Api;

use App\Models\Travel;
use App\Models\Assembly;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Api\TravelRequest;
use App\Transformers\TravelTransformer;
use App\Transformers\AssemblyTransformer;
use App\Transformers\GroupTransformer;

class TravelsController extends Controller
{
	/** [index 旅游基本信息列表] */
    public function index()
    {
    	return $this->response->collection(Travel::all(), new TravelTransformer());
    }

    /** [createrIndex 创建人项目列表] */
    public function createrIndex()
    {
        return $this->response->collection(Travel::where('add_by', $this->user()->id)->get(), new TravelTransformer());
    }

    /** [userIndex 用户的旅游团] */
    public function userIndex(User $user)
    {
        return $this->response->collection($user->travels, new TravelTransformer());
    }

    /** [show 旅游详情] */
    public function show(Travel $travel)
    {
    	return $this->response->item($travel, new TravelTransformer());
    }

    /** [store 创建旅游信息] */
    public function store(TravelRequest $request, Travel $travel)
    {
        if ($this->user()->tokens < config('user.tokens')) {
            return $this->response->error('金币不足，无法创建项目！', 422);
        }

        $travel->fill($request->all());
        // 新增项目责任人
        $travel->add_by = $this->user()->id;
        $travel->save();
        return $this->response->item($travel, new TravelTransformer())->setStatusCode(201);
    }

    /** [update 更新旅游信息] */
    public function update(TravelRequest $request, Travel $travel)
    {
        $travel->update($request->all());
        return $this->response->item($travel, new TravelTransformer());
    }
    /** [destriy 旅游项目的删除] */
    public function destroy(Travel $travel)
    {
        $travel->delete();
        return $this->response->noContent();
    }
}
