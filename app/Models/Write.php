<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Write extends Model
{
    protected $fillable = ['image', 'content', 'user_id', 'travel_id', 'write_title_id'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function travel()
    {
    	return $this->belongsTo(Travel::class);
    }
    
    public function write_title()
    {
    	return $this->belongsTo(WriteTitle::class);
    }



















}
