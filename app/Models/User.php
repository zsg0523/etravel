<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

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
        return $this->belongsToMany(Question::class, 'answers');
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
