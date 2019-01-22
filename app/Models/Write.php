<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Write extends Model
{
    protected $fillable = ['image', 'content'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }


    public function travel()
    {
    	return $this->belongsTo(Travel::class);
    }



















}
