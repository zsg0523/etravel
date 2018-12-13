<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
	protected $fillable = ['duty','room','group','is_promise'];

	public function travel()
	{
		return $this->belongsTo(Travel::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
