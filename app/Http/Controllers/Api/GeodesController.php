<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Utilities\GaodeMaps;
use App\Http\Requests\Api\GeodeRequest;

class GeodesController extends Controller
{
	/** [store 通过地址获取经纬度] */
    public function store(GeodeRequest $request)
    {
        $coordinates = GaodeMaps::geocodeAddress($request->address, $request->city, $request->state);
        return response()->json($coordinates);
    }



}
