<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $questions = ['question' => 'What is my name?'];
        // Question::create($questions);

        Question::create(['question' => 'What is my name?', 'subject_id' => 1, 'answer_id' => 1, 'option_id' => 3,]);
    }
}
