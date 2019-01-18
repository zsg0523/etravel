<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    protected $fillable = ['title','image','body'];

    public function route()
    {
    	return $this->belongsTo(Route::class);
    }

    public function questions()
    {
    	return $this->hasMany(Question::class);
    }

  	/** [setAvatarAttribute 修改头像，补全连接地址] */
    public function setImageAttribute($path)
    {
        if ( ! starts_with($path, 'http') ) {
             // 拼接完整的url
             $path = config('app.url')."/uploads/images/studies/$path";
        }

        $this->attributes['image'] = $path;
    }
    
}
