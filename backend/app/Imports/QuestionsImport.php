<?php

namespace App\Imports;

use App\Traits\QuestionsImportTrait;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class QuestionsImport implements ToModel, WithHeadingRow, WithChunkReading
{
    use QuestionsImportTrait;

    public function model(array $row)
    {
        $this->ImportQuestions($row);
    }

    public function chunkSize(): int
    {
        return 500;
    }
}
