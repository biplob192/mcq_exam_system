<?php

namespace App\Services;

use Exception;
use App\Models\Answer;
use App\Models\Option;
use App\Models\Question;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\BaseController;


class QuestionService extends BaseController
{
    public function index()
    {
        $questions = Question::with(['options', 'option', 'answer',])->where('status', 1)->get();
        return $this->sendResponse($questions, 'All question data.');
    }


    public function store($request)
    {
        // return $request;
        DB::beginTransaction();
        try {
            // 01. Storing question question
            $question = Question::create(['question' => $request->question, 'subject_id' => $request->subject_id]);

            // 02. Storing options
            foreach ($request->options as $option) {
                Option::create(['option' => $option, 'question_id' => $question->id]);
            }

            // Finding the right option id
            $rightOptionID = Option::where('option', $request->right_option)->where('question_id', $question->id)->pluck('id')->first();

            // 03. Storing answer
            $answer = Answer::create(['question_id' => $question->id, 'option_id' => $rightOptionID]);

            // 04. Updating answer_id and option_id in the question
            $question->option_id = $rightOptionID;
            $question->answer_id = $answer->id;
            $question->save();

            DB::commit();
            $question = Question::with(['options', 'option', 'answer',])->where('status', 1)->find($question->id);
            return $this->sendResponse($question, 'New question added successfully.', 201);
        } catch (Exception $e) {
            DB::rollBack();

            $error = $e->getMessage();
            return $this->sendError('Internal server error.', $error, 500);
        }
    }

    public function show($id)
    {
        $question = Question::with(['options', 'option', 'answer',])->where('status', 1)->find($id);
        return $this->sendResponse($question, 'Single question data.');
    }

    public function destroy($id)
    {
        $question = Question::find($id)->delete();
        return $this->sendResponse("", 'Question deleted successfully.');
    }
}
