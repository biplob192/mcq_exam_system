<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return ($this->isMethod('POST') ? $this->store() : $this->update());

        // public function store()
        // {
        //     $validator = Validator::make($request->all(), [
        //         'question' => 'required|unique:questions',
        //         'subject_id' => 'required',
        //         'options' => 'required',
        //         'right_option' => 'required',
        //     ]);

        //     if ($validator->fails()) {
        //         return $this->sendError('Validation Error.', $validator->errors());
        //     }
        // }
    }

    protected function store()
    {
        return [
            'question'      => 'required|unique:questions',
            'subject_id'    => 'required',
            'options'       => 'required',
            'right_option'  => 'required',
        ];
    }

    protected function update()
    {
        return [
            'question'      => ['required', Rule::unique('questions')->ignore($this->route('id'))],
            'subject_id'    => 'required',
            'options'       => 'required',
            'right_option'  => 'required',
        ];
    }
}
