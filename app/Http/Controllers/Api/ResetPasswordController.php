<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class ResetPasswordController extends Controller
{


    public function test(User $user)
    {
        event(new PasswordReset($user));
    }

    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function reset(Request $request)
    {
        $this->validate($request, $this->rules(), $this->validationErrorMessages());

        $verifyData = \Cache::get($request->verification_key);

        if ( ! $verifyData) {
            return $this->response->error('验证码已失效', 422);
        }

        if ( ! hash_equals($verifyData['code'], $request->verification_code)) {
            // 返回401
            return $this->response->errorUnauthorized('验证码错误');
        }

        
        $user = User::where('phone', $request->phone)->first();

        $response = $this->resetPassword($user, $request->password);
        
        return $this->response->array(['message' => "修改密码成功！"]);
        
    }

    

    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
     * @param  string  $password
     * @return void
     */
    protected function resetPassword($user, $password)
    {
        $user->password = Hash::make($password);

        $user->setRememberToken(Str::random(60));

        $user->save();

        event(new PasswordReset($user));
    }


    /**
     * Get the password reset validation rules.
     *
     * @return array
     */
    protected function rules()
    {
        return [
        	'verification_key' => 'required',
        	'verification_code' => 'required',
            'password' => 'required|confirmed|min:6',
            'phone' => 'required',
        ];
    }

    /**
     * Get the password reset validation error messages.
     *
     * @return array
     */
    protected function validationErrorMessages()
    {
        return [
        	'verification_key.required' => 'verification_key 不能为空！',
        	'verification_code.required' => '验证码不能为空！',
        ];
    }







}
