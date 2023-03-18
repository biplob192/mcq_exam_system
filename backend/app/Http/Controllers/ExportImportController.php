<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\QuestionsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\QuestionImportRequest;
use App\Http\Controllers\BaseController as BaseController;

class ExportImportController extends BaseController
{
    // public function importQuestions(QuestionImportRequest $request)
    public function importQuestions(Request $request)
    {
        $data = Excel::import(new QuestionsImport, $request->file('file'));
        return $this->sendResponse($data, 'Import has been completed successfully.', 201);
    }
}
