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

    public function userIndex(User $user)
    {
    	return $this->response->collection($user->answers, new AnswerTransformer());
    }

    public function questionIndex(Question $question)
    {
    	return $this->response->collection($question->answers, new AnswerTransformer());
    }

    public function show(Question $question, User $user, Answer $answer)
    {
    	if($answer->user_id != $user->id || $answer->question_id != $question->id) {
    		return $this->response->errorBadRequest();
    	}

    	return $this->response->item($answer, new AnswerTransformer());
    }

    public function store(AnswerRequest $request, Question $question, User $user, Answer $answer)
    {
    	$answer->fill($request->all());
    	$answer->question_id = $question->id;
    	$answer->user_id = $question->id;
    	$answer->save();

    	return $this->response->item($answer, new AnswerTransformer())->setStatusCode(201);

    }

    public function update(AnswerRequest $request, Question $question, User $user, Answer $answer)
    {
    	if($answer->user_id != $user->id || $answer->question_id != $question->id) {
    		return $this->response->errorBadRequest();
    	}

    	$answer->fill($request->all());
    	$answer->update();

    	return $this->response->item($answer, new AnswerTransformer());
    }

    public function destroy(Question $question, User $user, Answer $answer)
    {
    	if($answer->user_id != $user->id || $answer->question_id != $question->id) {
    		return $this->response->errorBadRequest();
    	}

    	$answer->delete();
    	return $this->response->noContent();
    }


}
