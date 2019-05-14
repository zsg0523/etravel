<?php

namespace App\Http\Controllers\Api;

use App\Models\{Image, User, Company, Travel, Student, Group, Emergency};
use Illuminate\Http\Request;
use App\Http\Requests\Api\UserRequest;
use App\Transformers\UserTransformer;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendSos;
use Overtrue\EasySms\{EasySms, PhoneNumber};



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
        // 获取缓存的手机号和区号，以及验证码
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
            'code' => $verifyData['idd_code'],
            'phone' => $verifyData['phone'],
            'password' => bcrypt($request->password),
            'en_name' => $request->en_name
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
    public function update(UserRequest $request, Emergency $emergency)
    {
        $user = $this->user();

        $attributes = $request->only(['name', 'en_name', 'introduction', 'sex']);

        if($request->avatar_image_id) {
            $image = Image::find($request->avatar_image_id);

            $attributes['avatar'] = $image->path;
        }

        $user->update($attributes);

        $emergency = $emergency->updateOrCreate(['user_id' => $user->id],$request->all());

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

    /** [updatePhone 修改用户手机号码] */ 
    public function updatePhone(UserRequest $request)
    {
        // 获取缓存的手机号和区号，以及验证码
        $verifyData = \Cache::get($request->verification_key);
        if ( ! $verifyData) {
            return $this->response->error('验证码已失效', 422);
        }

        if ( ! hash_equals($verifyData['code'], $request->verification_code)) {
            // 返回401
            return $this->response->errorUnauthorized('验证码错误');
        }

        $user = $this->user();
        $attributes = $request->only(['phone', 'code']);
        // 清除验证码缓存
        \Cache::forget($request->verification_key);

        $user->update($attributes);

        return $this->response->item($user, new UserTransformer());
        
    }

    /** [editEmail 修改用户邮箱地址] */
    public function editEmail(UserRequest $request)
    {
        // 获取缓存的手机号和区号，以及验证码
        $verifyData = \Cache::get($request->key);

        if ( ! $verifyData) {
            return $this->response->error('验证码已失效', 422);
        }

        if ( ! hash_equals($verifyData['code'], $request->code)) {
            // 返回401
            return $this->response->errorUnauthorized('验证码错误');
        }
        
        $user = $this->user();

        $attributes['email'] = $request->email;
        // 清除验证码缓存
        \Cache::forget($request->key);

        $user->update($attributes);

        return $this->response->item($user, new UserTransformer());
    }

    /**
     * [sos 一键报警]
     * @param  Travel    $travel    
     * @param  Emergency $emergency [description]
     * @param  EasySms   $easySms   [description]
     * @return [type]               [description]
     */
    public function sos(Travel $travel, Emergency $emergency, EasySms $easySms)
    {   
        
        try {
            // 用户紧急联系人电话和邮箱 
            $user_emergency = $this->user()->emergency;
            if ($user_emergency) {
                $this->sendSms($easySms, $user_emergency->code_one, $user_emergency->emergency_phone_one, '127203');
                $this->sendSms($easySms, $user_emergency->code_two, $user_emergency->emergency_phone_two, '127203');
                $this->sendMail($user_emergency->emergency_email_one, $user_emergency->emergency_email_two, $this->user);   
            }
        } finally {
            try {
                // 旅游团紧急联系人电话和邮箱
                $travel_emergency = $travel->emergency;
                if ($travel_emergency) {
                    $this->sendSms($easySms, $travel_emergency->code_one, $travel_emergency->emergency_phone_one, '127203');
                    $this->sendSms($easySms, $travel_emergency->code_two, $travel_emergency->emergency_phone_two, '127203');
                    $this->sendMail($travel_emergency->emergency_email_one, $travel_emergency->emergency_email_two, $this->user);
                }
            } finally {
                try {
                    // 公司紧急联系人
                    $company_emergency = Company::whereShow('1')->first();
                    if ($company_emergency) {
                        $this->sendSms($easySms, $company_emergency->code_one, $company_emergency->emergency_phone_one, '127203');
                        $this->sendSms($easySms, $company_emergency->code_two, $company_emergency->emergency_phone_two, '127203');
                        $this->sendMail($company_emergency->emergency_email_one, $company_emergency->emergency_email_two, $this->user);
                    }
                } finally {
                    return $this->response->array(['message' => '求救短信和邮箱已发出！']);
                }  
            }
        }
    }

    /**
     * [sendSms 腾讯云发送短信]
     * @param  [type]  $code     [区号]
     * @param  [type]  $phone    [电话]
     * @param  [type]  $template [模版 ID]
     * @param  [type] $easySms  [实例]
     * @return [type]            [description]
     */
    private function sendSms($easySms, $idd_code, $phone, $template)
    {
        $phone = new PhoneNumber($phone, $idd_code);
        try {
            $easySms->send($phone, [
                'data' => [
                    '12345',
                    '1',
                ],
                'template'  => '127203',
            ]);
        } catch (\Overtrue\EasySms\Exceptions\NoGatewayAvailableException $exception) {

            $message = $exception->getException('qcloud')->getMessage();
            // return $this->response->errorInternal($message ?: '短信发送异常');
        }
    }

    /**
     * [sendMail 发送邮件]
     * @param  [type] $to       [收件人邮箱]
     * @param  [type] $cc       [抄送人]
     * @param  [type] $instance [实例]
     * @return [type]           [异步发送]
     */
    private function sendMail($to, $cc, $instance)
    {
        Mail::to($to)
            ->cc($cc)
            ->queue(new SendSos($instance));
    }



























}
