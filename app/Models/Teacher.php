<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['number', 'title'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }


    public function school()
    {
    	return $this->belongsTo(School::class);
    }









}
