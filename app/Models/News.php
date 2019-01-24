<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title','image','body'];

    /** [setAvatarAttribute 修改头像，补全连接地址] */
    public function setImageAttribute($path)
    {
        if ( ! starts_with($path, 'http') ) {
             // 拼接完整的url
             $path = config('app.url')."/uploads/images/news/$path";
        }

        $this->attributes['image'] = $path;
    }
}
