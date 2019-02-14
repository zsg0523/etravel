<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Travel;
use App\Models\Group;
use Illuminate\Http\Request;
use App\Http\Requests\Api\GroupRequest;
use App\Transformers\GroupTransformer;
use App\Transformers\UserTransformer;

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

    /** [show 单个分组安排详情] */
    public function show(Travel $travel, Group $group)
    {
        if($group->user_id != $this->user()->id || $group->travel_id != $travel->id) {
            return $this->response->errorBadRequest();
        }
        
    	return $this->response->item($group, new GroupTransformer());
    }

    /** [userGroup 添加用户并分组] */
    public function userGroup(Request $request,User $user, Group $group)
    {
        // 验证用户数据
        $validateData = $request->validate([
            'name' => 'required|between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:users,name',
            'email' => 'email|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'add_by' => 'required'
        ]);
        // 添加用户
        $user->fill($request->all());
        $user->save();
        
        // 添加用户与旅游团关联关系
        $group->fill([
            'user_id' => $user->id,
            'travel_id' => $request->travel_id,
            'student_number' => $request->student_number,
            'class' => $request->class,
        ]);
        $group->save();

        return $this->response->item($group, new GroupTransformer())->setStatusCode(201);
    }

    /** [store 新建分组] */
    public function store(GroupRequest $request,User $user, Travel $travel, Group $group)
    {
    	$group->fill($request->all());
    	$group->travel_id = $travel->id;
    	$group->user_id = $user->id;
    	$group->save();

    	return $this->response->item($group, new GroupTransformer())->setStatusCode(201);

    }

    /** [update 更新分组安排] */
    public function update(GroupRequest $request,User $user, Travel $travel, Group $group)
    {
        if($group->user_id != $user->id || $group->travel_id != $travel->id) {
            return $this->response->errorBadRequest();
        }
        
    	$group->fill($request->all());
    	$group->update();

    	return $this->response->item($group, new GroupTransformer());
    }

    /** [destroy 删除分组信息] */
    public function destroy(User $user, Travel $travel, Group $group)
    {
        if($group->user_id != $user->id || $group->travel_id != $travel->id) {
            return $this->response->errorBadRequest();
        }

    	$group->delete();

    	return $this->response->noContent();
    }


}
