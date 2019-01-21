<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable implements JWTSubject
{
    use HasRoles;
    use Traits\LastActivedAtHelper;
    use Notifiable {
        notify as protected laravelNotify;
    }
    public function notify($instance)
    {
        $this->increment('notification_count');
        $this->laravelNotify($instance);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'introduction', 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /** [markAsRead 将所有通知设定为已读，并清空未读消息数] */
    public function markAsRead()
    {
        $this->notification_count = 0;
        $this->save();
        $this->unreadNotifications->markAsRead();
    }

    /** [isAuthorOf 判断身份] */
    public function isAuthorOf($model)
    {
        return $this->id == $model->user_id;
    }

    /** [setPasswordAttribute 修改器修改密码] */
    public function setPasswordAttribute($value)
    {
        if (strlen($value) != 60) {
            // 不等于 60 ，不做加密处理
            $value = bcrypt($value);
        }

        $this->attributes['password'] = $value;
    }


    /** [setAvatarAttribute 修改头像，补全连接地址] */
    public function setAvatarAttribute($path)
    {
        if ( ! starts_with($path, 'http') ) {
             // 拼接完整的url
             $path = config('app.url')."/uploads/images/avatars/$path";
        }

        $this->attributes['avatar'] = $path;
    }


    // Rest omitted for brevity
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    /** [student 学生基本信息] */
    public function student()
    {
        return $this->hasOne(Student::class);
    }

    /** [groups 用户的分组信息] */
    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    /** [users 属于多个用户] */
    public function travels()
    {
        return $this->belongsToMany(Travel::class, 'groups')->withPivot('room', 'group', 'is_promise', 'duty');
    }

    /** [questions 用户回答学习工作纸问题] */
    public function questions()
    {
        return $this->belongsToMany(Question::class, 'answers')->withPivot('content')->withTimesTamps();
    }

    /** [answers 用户工作纸答案] */
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }


    /** [summaries 用户总结] */
    public function summaries()
    {
        return $this->hasMany(Write::class);
    }

    public function examines()
    {
        return $this->hasMany(Examine::class);
    }

    public function rules()
    {
        return $this->belongsToMany(Rule::class, 'examines')->withPivot('before', 'after');
    }














}
