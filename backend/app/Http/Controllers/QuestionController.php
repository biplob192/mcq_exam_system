<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\QuestionRequest;
use App\Services\QuestionService;

class QuestionController extends Controller
{
    public function __construct(private QuestionService $questionService)
    {
    }


    public function index()
    {
        return $this->questionService->index();
    }


    public function store(QuestionRequest $request)
    {
        return $this->questionService->store($request);
    }


    public function show(string $id)
    {
        return $this->questionService->show($id);
    }


    public function update(Request $request, string $id)
    {
        return $this->questionService->update($request);
    }


    public function destroy(string $id)
    {
        return $this->questionService->destroy($id);
    }
}
