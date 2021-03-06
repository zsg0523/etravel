<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\School;
use App\Http\Requests\Api\SchoolRequest;
use App\Transformers\SchoolTransformer;

class SchoolsController extends Controller
{
	/** [index 所有学校列表] */
    public function index()
    {
    	return $this->response->collection(School::all(), new SchoolTransformer());
    }

    /** [show 学校信息] */
    public function show(School $school)
    {
    	return $this->response->item($school, new SchoolTransformer());
    }

    /** [store 创建学校信息] */
    public function store(SchoolRequest $request, School $school)
    {
    	$school->fill($request->all());
    	$school->save();

    	return $this->response->item($school, new SchoolTransformer())->setStatusCode(201);
    }

    /** [update 更新学校信息] */
    public function update(SchoolRequest $request, School $school)
    {
    	$school->fill($request->all());
    	$school->update();

    	return $this->response->item($school, new SchoolTransformer());
    }


    /** [destroy 删除学校信息] */
    public function destroy(School $school)
    {
    	$school->delete();

    	return $this->response->noContent();
    }



}
