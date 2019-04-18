<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = ['travel_id', 'hotel_name', 'hotel_address', 'hotel_phone', 'check_at', 'leave_at', 'times', 'image', 'hotel_location'];

    public function travel()
    {
    	return $this->belongsTo(Travel::class);
    }

    /** [setImageAttribute 后台上传酒店图片需补齐地址] */
    public function setImageAttribute($path)
    {
    	if ( ! starts_with($path, 'http') ) {
             // 拼接完整的url
             $path = config('app.url')."/uploads/images/hotels/$path";
        }

        $this->attributes['image'] = $path;
    }





}
