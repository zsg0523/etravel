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
    	return $this->response->collection(Group::group()->get(), new GroupTransformer());
    }

    /** [travelIndex 旅行团分组安排] */
    public function travelIndex(Travel $travel, Group $group)
    {
        // 按照房间排序
        // $groups = $travel->groups()->room()->get();
        // 按照分组排序
    	$groups = $travel->groups()->group()->get();
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
        // dd($travel);
        // $schools = User::find($travel->add_by)->schools;

        // return $this->response->item($group, new GroupTransformer())->setMeta($schools->toArray());
        // $school = User::find($travel->school_id)->school;
    	// return $this->response->item($group, new GroupTransformer())->setMeta($school->toArray());
        $travel = $group->travel()->get();

        return $this->response->item($group, new GroupTransformer())->setMeta($travel->toArray());

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

    /** [information 旅游团下的人员定位信息] */
    public function information(Group $group)
    {
        return $this->response->collection(Group::with('location','user')->get(), new GroupTransformer());
    } 

}
