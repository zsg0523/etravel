<?php

namespace App\Http\Controllers\Api;

use App\Models\Question;
use App\Models\Study;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Api\QuestionRequest;
use App\Transformers\QuestionTransformer;

class QuestionsController extends Controller
{
    public function index()
    {
    	return $this->response->collection(Question::all(), new QuestionTransformer(null));
    }

    /** [studyIndex 工作纸下所有问题] */
    public function studyIndex(Study $study)
    {
    	return $this->response->collection($study->questions, new QuestionTransformer($this->user()->id));
    }

    public function userIndex(User $user)
    {
        return $this->response->collection($user->questions, new QuestionTransformer(null));
    }

    public function show(Study $study, Question $question)
    {
    	if($question->study_id != $study->id) {
    		return $this->response->errorBadRequest();
    	}
    	return $this->response->item($question, new QuestionTransformer(null));
    }

    public function store(QuestionRequest $request, Study $study, Question $question)
    {
    	$question->fill($request->all());
    	$question->study_id = $study->id;
    	$question->save();

    	return $this->response->item($question, new QuestionTransformer(null))->setStatusCode(201);
    }

    public function update(QuestionRequest $request, Study $study, Question $question)
    {
    	if($question->study_id != $study->id) {
    		return $this->response->errorBadRequest();
    	}

    	$question->fill($request->all());
    	$question->update();

    	return $this->response->item($question, new QuestionTransformer(null));
    }


    public function destroy(Study $study, Question $question)
    {
    	if($question->study_id != $study->id) {
    		return $this->response->errorBadRequest();
    	}

    	$question->delete();
    	return $this->response->noContent();
    }

}
