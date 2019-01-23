<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\EvaluationCategory;
use App\Models\Travel;
use App\Models\Evaluation;
use App\Transformers\EvaluationTransformer;

class EvaluationsController extends Controller
{
	/** [index 所有评估选项列表] */
   	public function index()
   	{
   		return $this->response->collection(Evaluation::all(), new EvaluationTransformer());
   	}

   	/** [show 详情] */
   	public function show(Evaluation $evaluation)
   	{
   		return $this->response->item($evaluation, new EvaluationTransformer());
   	}






}
