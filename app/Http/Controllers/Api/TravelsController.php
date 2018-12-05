<?php

namespace App\Http\Controllers\Api;

use App\Models\Travel;
use Illuminate\Http\Request;
use App\Transformers\TravelTransformer;

class TravelsController extends Controller
{
    public function index()
    {
    	return $this->response->collection(Travel::all(), new TravelTransformer());
    }
}
