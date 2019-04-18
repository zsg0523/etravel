<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
	protected $fillable = ['user_id', 'travel_id', 'duty', 'room', 'group', 'is_promise', 'student_number', 'class'];

	public function travel()
	{
		return $this->belongsTo(Travel::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	/** [scopeRoom 按房间号码大小排序] */
	public function scopeRoom($query)
	{
		return $query->orderBy('room', 'asc');
	}

	/** [scopeGroup 按分组大小排序] */
	public function scopeGroup($query)
	{
		return $query->orderBy('group', 'asc');
	}













}
