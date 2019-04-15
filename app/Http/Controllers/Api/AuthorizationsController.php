<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Api\AuthorizationRequest;
use Auth;

class AuthorizationsController extends Controller
{
	/** [store 登录] */
    public function store(AuthorizationRequest $request)
    {
        $username = $request->username;

        filter_var($username, FILTER_VALIDATE_EMAIL) ?
            $credentials['email'] = $username :
            $credentials['phone'] = $username;

        $credentials['password'] = $request->password;

        if (!$token = \Auth::guard('api')->attempt($credentials)) {
            return $this->response->errorUnauthorized('用户名或密码错误');
        }

        return $this->respondWithToken($token)->setStatusCode(201);
    }

    
    protected function respondWithToken($token)
    {
    	return $this->response->array([
    		'access_token' => $token,
	        'token_type' => 'Bearer',
	        'expires_in' => \Auth::guard('api')->factory()->getTTL() * 60
    	]);
    }

    /** [update 刷新token] */
    public function update()
    {
    	$token = Auth::guard('api')->refresh();
    	return $this->respondWithToken($token);
    }

    /** [destroy 删除token] */
    public function destroy()
    {
    	Auth::guard('api')->logout();
    	return $this->response->noContent();
    }

}
