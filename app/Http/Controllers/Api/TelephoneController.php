<?php

namespace App\Http\Controllers\Api;

use App\Models\Telephone;
use Illuminate\Http\Request;
use App\Transformers\Telephonetransformer;

class TelephoneController extends Controller
{
    public function index()
    {
    	return $this->response->collection(Telephone::all(), new Telephonetransformer());
    }
}
