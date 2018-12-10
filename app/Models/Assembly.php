<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assembly extends Model
{
    public function travel()
    {
    	$this->belongsTo(Travel::class);
    }
}
