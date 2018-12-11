<?php

namespace App\Http\Controllers\Api;

use App\Models\Image;
use App\Models\User;
use App\Models\Student;
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
    	$user = User::create([
    		'name' => $request->name,
    		'email' => $request->email,
    		'password' => bcrypt($request->password),
    	]);

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

        $attributes = $request->only(['name','email','introduction']);

        if($request->avatar_image_id) {
            $image = Image::find($request->avatar_image_id);

            $attributes['avatar'] = $image->path;
        }
        $user->update($attributes);

        return $this->response->item($user, new UserTransformer());
    }















}
