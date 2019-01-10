<?php

namespace App\Http\Controllers\Api;

use App\Models\WriteTitle;
use Illuminate\Http\Request;
use App\Http\Requests\Api\WriteTitleRequest;
use App\Transformers\WriteTitleTransformer;

class WriteTitlesController extends Controller
{
	public function index()
	{
		return $this->response->collection(WriteTitle::all(), new WriteTitleTransformer());
	}

	public function show(WriteTitle $writetitle)
	{
		return $this->response->item($writetitle, new WriteTitleTransformer());
	}

    public function store(WriteTitleRequest $request, WriteTitle $writetitle)
    {
    	$writetitle->fill($request->all());
    	$writetitle->save();

    	return $this->response->item($writetitle, new WriteTitleTransformer())->setStatusCode(201);
    }

    public function update(WriteTitleRequest $request, WriteTitle $writetitle)
    {
    	$writetitle->update($request->all());

    	return $this->response->item($writetitle, new WriteTitleTransformer());
    }

    public function destroy(WriteTitle $writetitle)
    {
    	$writetitle->delete();

    	return $this->response->noContent();
    }
}
