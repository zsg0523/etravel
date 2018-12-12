<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Travel;
use App\Models\Group;
use Illuminate\Http\Request;
use App\Http\Requests\Api\GroupRequest;
use App\Transformers\GroupTransformer;

class GroupsController extends Controller
{
	/** [index 所有分组] */
    public function index()
    {
    	return $this->response->collection(Group::all(), new GroupTransformer());
    }

    /** [travelIndex 旅行团分组安排] */
    public function travelIndex(Travel $travel)
    {
    	$groups = $travel->groups;
    	return $this->response->collection($groups, new GroupTransformer());
    }

    /** [userIndex 用户分组安排] */
    public function userIndex(User $user)
    {
    	$groups = $user->groups;

    	return $this->response->collection($groups, new GroupTransformer());
    }

    /** [show 用户分组安排详情] */
    public function show(Group $group)
    {
    	return $this->response->item($group, new GroupTransformer());
    }

    /** [store 新建分组] */
    public function store(GroupRequest $request, Travel $travel, User $user, Group $group)
    {
    	$group->fill($request->all());
    	$group->travel_id = $travel->id;
    	$group->user_id = $user->id;
    	$group->save();

    	return $this->response->item($group, new GroupTransformer())->setStatusCode(201);

    }

    /** [update 更新分组安排] */
    public function update(GroupRequest $request, Travel $travel, User $user, Group $group)
    {
    	$group->fill($request->all());
    	$group->travel_id = $travel->id;
    	$group->user_id = $user->id;
    	$group->update();

    	return $this->response->item($group, new GroupTransformer());
    }

    /** [destroy 删除分组信息] */
    public function destroy(Travel $travel, User $user, Group $group)
    {
    	$group->delete();

    	return $this->response->noContent();
    }


}
