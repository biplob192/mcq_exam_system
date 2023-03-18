<?php

namespace App\Traits;

use Exception;
use App\Models\Answer;
use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


trait QuestionsImportTrait
{
    public function ImportQuestions($row)
    {
        // Check Validation
        Validator::make(
            $row,
            [
                // 'question'      => 'required|unique:questions',
                'question'      => 'required',
                'subject_id'    => 'required|integer',
                'option_1'      => 'required',
                'option_2'      => 'required',
                'option_3'      => 'required',
                'option_4'      => 'required',
                'right_option'  => 'required',
            ]
        )->validate();

        // Storing data from file
        try {
            // Find if the question already exist or not
            $questionExist = Question::where('question', $row['question'])->first();

            if (!$questionExist) {
                // 01. Storing question
                $question = Question::create(['question' => $row['question'], 'subject_id' => $row['subject_id']]);

                // 02. Storing options
                Option::create(['option' => $row['option_1'], 'question_id' => $question->id]);
                Option::create(['option' => $row['option_2'], 'question_id' => $question->id]);
                Option::create(['option' => $row['option_3'], 'question_id' => $question->id]);
                Option::create(['option' => $row['option_4'], 'question_id' => $question->id]);

                // Finding the right option id
                $rightOptionID = Option::where('option', $row['right_option'])->where('question_id', $question->id)->pluck('id')->first();
                if (!$rightOptionID) {
                    throw new Exception("Right option of '{$row['question']}' does not exist in the options!", 404);
                }

                // 03. Storing answer
                $answer = Answer::create(['question_id' => $question->id, 'option_id' => $rightOptionID]);

                // 04. Updating answer_id and option_id in the question
                $question->option_id = $rightOptionID;
                $question->answer_id = $answer->id;
                $question->save();
            } else {
                throw new Exception("The question '{$row['question']}' has already been taken.", 422);
            }
        } catch (Exception $error) {
            throw $error;
        }
    }

    // return new Question([
    //     // File with no heading
    //     // 'name'     => $row[1],
    //     // 'email'    => $row[2],
    //     // 'phone'    => $row[3],
    //     // 'address'  => $row[4],
    //     // 'nid'      => $row[5]

    //     // File with heading
    //     'question'      => $row['question'],
    //     'subject_id'    => $row['subject_id'],
    //     'answer_id'     => $row['answer_id'],
    //     'option_id'     => $row['option_id'],
    // ]);
}
