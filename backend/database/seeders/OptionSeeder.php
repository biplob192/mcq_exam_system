<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Option;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $options = [
            ['option' => 'MASUD RANA', 'question_id' => 1],
            ['option' => 'ABDUL HAMID', 'question_id' => 1],
            ['option' => 'MD BIPLOB', 'question_id' => 1],
            ['option' => 'SHAJIB HASSAN', 'question_id' => 1],
        ];

        foreach ($options as $option) {
            Option::create($option);
        }


        // Create answer seeder here
        Answer::create(['question_id' => 1,'option_id' => 3]);
    }
}
