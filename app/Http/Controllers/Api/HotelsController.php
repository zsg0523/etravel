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

    /** [show 酒店详情] */
    public function show(Hotel $hotel)
    {
    	return $this->response->item($hotel, new HotelTransformer());
    }

    /** [store 创建酒店] */
    public function store(HotelRequest $request, Hotel $hotel)
    {
    	$hotel->fill($request->all());
    	$hotel->save();
    	return $this->response->item($hotel, new HotelTransformer())->setStatusCode(201);
    }

    /** [update 更新酒店信息] */
    public function update(HotelRequest $request, Hotel $hotel)
    {
    	$hotel->update($request->all());
    	return $this->response->item($hotel, new HotelTransformer());
    }

    /** [destroy 删除酒店信息] */
    public function destroy(Hotel $hotel)
    {
    	$hotel->delete();
    	return $this->response->noContent();
    }
}
