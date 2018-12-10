<?php

namespace App\Http\Controllers\Api;

use App\Models\Telephone;
use Illuminate\Http\Request;
use App\Http\Requests\Api\TelephoneRequest;
use App\Transformers\TelephoneTransformer;

class TelephoneController extends Controller
{
	/** [index 电话本列表] */
    public function index()
    {
    	return $this->response->collection(Telephone::all(), new Telephonetransformer());
    }

    /** [store 创建联系人电话] */
    public function store(TelephoneRequest $request, Telephone $telephone)
    {
    	$telephone->fill($request->all());
    	$telephone->save();

    	return $this->response->item($telephone, new Telephonetransformer())->setStatusCode(201);
    }

    /** [update 编辑联系人电话] */
    public function update(TelephoneRequest $request, Telephone $telephone)
    {
    	$telephone->update($request->all());
    	return $this->response->item($telephone, new Telephonetransformer());
    }

    /** [destroy 删除联系人电话] */
    public function destroy(Telephone $telphone)
    {
    	$telphone->delete();
    	return $this->response->noContent();
    }
}
