<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\EvaluationCategory;
use App\Models\Travel;
use App\Models\Evaluation;
use App\Transformers\EvaluationTransformer;
use App\Http\Requests\Api\EvaluationRequest;

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

      /** [store 创建评估选项] */
      public function store(EvaluationRequest $request, EvaluationCategory $category, Evaluation $evaluation)
      {
         $evaluation->fill($request->all());
         $evaluation->evaluation_category_id = $category->id;
         $evaluation->save();

         return $this->response->item($evaluation, new EvaluationTransformer())->setStatusCode(201);
      }

      /** [update 更新评估选项] */
      public function update(EvaluationRequest $request, EvaluationCategory $category, Evaluation $evaluation)
      {
         if ($evaluation->evaluation_category_id != $category->id) {
            return $this->response->errorBadRequest();
         }

         $evaluation->fill($request->all());
         $evaluation->update();

         return $this->response->item($evaluation, new EvaluationTransformer());
      }


      /** [destroy 删除评论] */
      public function destroy(EvaluationCategory $category, Evaluation $evaluation)
      {
         if ($evaluation->evaluation_category_id != $category->id) {
            return $this->response->errorBadRequest();
         }

         $evaluation->delete();

         return $this->response->noContent();
      }






}
