<?php

namespace App\Http\Controllers\Api;

use App\Models\Flight;
use Illuminate\Http\Request;
use App\Transformers\FlightTransformer;
use App\Http\Requests\Api\FlightRequest;

class FlightsController extends Controller
{
	/** [index 航班列表] */
    public function index()
    {
    	return $this->response->collection(Flight::all(), new FlightTransformer());
    }


    /** [show 航班信息] */
    public function show(Flight $flight)
    {
    	return $this->response->item($flight, new FlightTransformer());
    }

    /** [store 创建航班] */
    public function store(FlightRequest $request, Flight $flight)
    {
    	$flight->fill($request->all());
    	$flight->save();
    	return $this->response->item($flight, new FlightTransformer())->setStatusCode(201);
    }

    /** [update 更新航班信息] */
    public function update(FlightRequest $request, Flight $flight)
    {
    	$flight->update($request->all());
    	return $this->response->item($flight, new FlightTransformer());
    }

    /** [delete 删除航班] */
    public function destroy(Flight $flight)
    {
        $flight->delete();
        return $this->response->noContent();
    }

















}
