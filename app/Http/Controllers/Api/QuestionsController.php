<?php

namespace App\Http\Controllers\Api;

use App\Models\Question;
use App\Models\Study;
use Illuminate\Http\Request;
use App\Http\Requests\Api\QuestionRequest;
use App\Transformers\QuestionTransformer;

class QuestionsController extends Controller
{
    public function index()
    {
    	return $this->response->collection(Question::all(), new QuestionTransformer());
    }

    public function studyIndex(Study $study)
    {
    	return $this->response->collection($study->questions, new QuestionTransformer());
    }

    public function show(Study $study, Question $question)
    {
    	if($question->study_id != $study->id) {
    		return $this->response->errorBadRequest();
    	}

    	return $this->response->item($question, new QuestionTransformer());
    }

    public function store(QuestionRequest $request, Study $study, Question $question)
    {
    	$question->fill($request->all());
    	$question->study_id = $study->id;
    	$question->save();

    	return $this->response->item($question, new QuestionTransformer())->setStatusCode(201);
    }

    public function update(QuestionRequest $request, Study $study, Question $question)
    {
    	if($question->study_id != $study->id) {
    		return $this->response->errorBadRequest();
    	}

    	$question->fill($request->all());
    	$question->update();

    	return $this->response->item($question, new QuestionTransformer());
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
