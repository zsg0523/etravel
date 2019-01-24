<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['content'];

    /** [users 用户] */
    public function users()
    {
    	return $this->belongsToMany(User::class, 'answers');
    }

    /** [study 学习工作纸] */
    public function study()
    {
    	return $this->belongsTo(Study::class);
    }

    /** [answers 答案] */
    public function answers()
    {
    	return $this->hasMany(Answer::class);
    }

    /** [getTravelAttribute 获取旅游名称] */
    public function getTravelAttribute($value)
    {
        return $this->study->route->travel->travel_name;
    }

    /** [getDayAttribute 获取行程编号] */
    public function getDayAttribute($value)
    {
        return $this->study->route->day;
    }

}
