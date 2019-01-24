<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EvaluateUser;
use App\Models\Evaluation;
use App\Http\Requests\Api\EvaluateUserRequest;
use App\Transformers\EvaluateUserTransformer;


class EvaluatesController extends Controller
{
	/** [index 所有评估列表] */
	public function index()
	{
		return $this->response->collection(EvaluateUser::all(), new EvaluateUserTransformer());
	}


	public function store(EvaluateUserRequest $request, Evaluation $evaluation, EvaluateUser $evaluate_user)
	{
		// 检查更新
		$evaluate_user = $evaluate_user->updateOrCreate(
			['user_id'=>$this->user()->id, 'evaluation_id'=>$evaluation->id],
			['option'=> $request->option]
		);

		return $this->response->item($evaluate_user, new EvaluateUserTransformer());

	}


	public function destroy(Evaluation $evaluation, EvaluateUser $evaluate_user)
	{
		$evaluate_user->delete();

		return $this->response->noContent();
	}











}
