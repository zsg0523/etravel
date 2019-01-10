<?php

namespace App\Http\Controllers\Api;

use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Api\AnswerRequest;
use App\Transformers\AnswerTransformer;

class AnswersController extends Controller
{

    public function index()
    {
    	return $this->response->collection(Answer::all(), new AnswerTransformer());
    }

    /** [userIndex 用户的答案] */
    public function userIndex(User $user)
    {
    	return $this->response->item($user->questions, new AnswerTransformer());
    }

    /** [questionIndex 问题下所有答案] */
    public function questionIndex(Question $question)
    {
    	return $this->response->collection($question->answers, new AnswerTransformer());
    }

    /** [show 答案详情] */
    public function show(Question $question, Answer $answer)
    {
    	if( $answer->question_id != $question->id ) {
    		return $this->response->errorBadRequest();
    	}

    	return $this->response->item($answer, new AnswerTransformer());
    }

    /** [store 创建答案] */
    public function store(AnswerRequest $request, Question $question, Answer $answer)
    {
    	$answer->fill($request->all());
    	$answer->question_id = $question->id;
    	$answer->user_id = $this->user()->id;
    	$answer->save();

    	return $this->response->item($answer, new AnswerTransformer())->setStatusCode(201);

    }

    /** [update 编辑答案] */
    public function update(AnswerRequest $request, Question $question, Answer $answer)
    {
    	if($answer->question_id != $question->id) {
    		return $this->response->errorBadRequest();
    	}

    	$answer->fill($request->all());
    	$answer->update();

    	return $this->response->item($answer, new AnswerTransformer());
    }

    /** [destroy 删除答案] */
    public function destroy(Question $question, Answer $answer)
    {
    	if($answer->question_id != $question->id) {
    		return $this->response->errorBadRequest();
    	}

    	$answer->delete();
    	return $this->response->noContent();
    }


}
