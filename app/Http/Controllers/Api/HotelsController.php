<?php

namespace App\Http\Controllers\Api;

use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Http\Requests\Api\HotelRequest;
use App\Transformers\HotelTransformer;

class HotelsController extends Controller
{
	/** [index 酒店列表] */
    public function index()
    {
    	return $this->response->collection(Hotel::all(), new HotelTransformer());
    }
}
