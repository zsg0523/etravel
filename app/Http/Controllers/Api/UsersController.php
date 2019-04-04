<?php

namespace App\Http\Controllers\Api;

use App\Models\Image;
use App\Models\User;
use App\Models\Student;
use App\Models\Group;
use Illuminate\Http\Request;
use App\Http\Requests\Api\UserRequest;
use App\Transformers\UserTransformer;

class UsersController extends Controller
{
    /** [index 用户列表] */
    public function index()
    {
        return $this->response->collection(User::all(), new UserTransformer());
    }

	/**
	 * 用户注册
	 */
    public function store(UserRequest $request)
    {
        $verifyData = \Cache::get($request->verification_key);

        if ( ! $verifyData) {
            return $this->response->error('验证码已失效', 422);
        }

        if ( ! hash_equals($verifyData['code'], $request->verification_code)) {
            // 返回401
            return $this->response->errorUnauthorized('验证码错误');
        }

        $user = User::create([
            'name' => $request->name,
            'phone' => $verifyData['phone'],
            'password' => bcrypt($request->password),
        ]);
        // 清除验证码缓存
        \Cache::forget($request->verification_key);
        
    	return $this->response->item($user, new UserTransformer())
                ->setMeta([
                    'access_token' => \Auth::guard('api')->fromUser($user),
                    'token_type' => 'Bearer',
                    'expires_in' => \Auth::guard('api')->factory()->getTTL() * 60
                ])
                ->setStatusCode(201);
    }

    /** [me 当前用户信息] */
    public function me()
    {
        return $this->response->item($this->user(), new UserTransformer());
    }

    /** [update 更新用户信息] */
    public function update(UserRequest $request)
    {
        $user = $this->user();

        $attributes = $request->only(['name', 'en_name', 'email', 'introduction', 'sex']);

        if($request->avatar_image_id) {
            $image = Image::find($request->avatar_image_id);

            $attributes['avatar'] = $image->path;
        }
        $user->update($attributes);

        return $this->response->item($user, new UserTransformer());
    }


    /** [userList 管理员平台添加用户列表] */
    public function userList(User $user)
    {
        return $this->response->collection($user->where('add_by', $user->id)->get(), new UserTransformer());
    }

    /** [userInfo 查询某ID用户信息] */
    public function userInfo(Request $request, User $user)
    {   
        // 用户已经参加的旅游团 ids
        $travel_ids = $user->travels->pluck('id')->toArray();

        if(in_array($request->travel_id, $travel_ids)) {
           return $this->response->array(['message' => '该用户已参加！'])->setStatusCode(202);
        }

        return $this->response->item($user, new UserTransformer());
    }

    /** [schoolUser 查询管理员所有学校的学生] *2
    public function schoolUser(User $user)
    {
        // return $this->response->collection();
    }


    /** [userGroup 管理员创建学生并分组] */
    public function userGroup(UserRequest $request,User $user, Group $group)
    {
        $data = $request->all();
        // 加密明文密码
        $data['password'] = bcrypt((string)$request->original_password);
        // 添加用户
        $user->fill($data);
        $user->save();
        
        // 添加用户与旅游团关联关系
        $group->fill($data);
        $group->user_id = $user->id;
        $group->save();

        return $this->response->item($user, new UserTransformer())->setStatusCode(201);
    }


    /** [information 管理员编辑用户信息] */
    public function information(UserRequest $request, User $user, Group $group)
    {   
        $manager = $this->user();

        if ( ! $manager->can('manage_contents') ) {
            return $this->response->errorBadRequest();
        }

        // 更新学生基本信息
        $user->update($request->all());

        // 更新分组学生信息
        $group->update($request->all());

        return $this->response->item($user, new UserTransformer());
    }


    

















}
