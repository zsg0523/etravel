<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = ['content', 'image', 'type', 'to_id'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
