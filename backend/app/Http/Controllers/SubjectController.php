<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;
use App\Http\Controllers\BaseController as BaseController;

class SubjectController extends BaseController
{
    public function index()
    {
        $subjects = Subject::get();
        return $this->sendResponse($subjects, 'All subject data.');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required|unique:subject',
            'author'    => 'required',
            'price'     => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        try {
            $subjects = new Subject();

            $subjects->name = $request->name;
            $subjects->author = $request->author;
            $subjects->price = $request->price;
            $subjects->save();

            return $this->sendResponse($subjects, 'Book created successfully.', 201);
        } catch (Exception $e) {

            $error = $e->getMessage();
            return $this->sendError('Internal server error.', $error, 500);
        }
    }

    public function show($id)
    {
        $subjects = Subject::find($id);

        if (!$subjects) {
            return $this->sendError('Record not found!');
        }
        return $this->sendResponse($subjects, 'Book data.', 200);
    }

    public function update(Request $request, $id)
    {
        try {
            $subjects = Subject::find($id);
            $subjects->update($request->all());

            return $this->sendResponse($subjects, 'Book updated successfully.', 204);
        } catch (Exception $e) {

            $error = $e->getMessage();
            return $this->sendError('Internal server error.', $error, 500);
        }
    }

    public function destroy($id)
    {
        try {
            Subject::find($id)->delete();

            return $this->sendResponse("", 'Book deleted successfully.');
        } catch (Exception $e) {

            $error = $e->getMessage();
            return $this->sendError('Internal server error.', $error, 500);
        }
    }

}
