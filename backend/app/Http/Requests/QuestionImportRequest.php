<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class QuestionImportRequest extends FormRequest
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
    }

    protected function store()
    {
        return [
            'question'      => 'required|unique:questions',
            'subject_id'    => 'required|integer',
            'option_1'      => 'required',
            'option_2'      => 'required',
            'option_3'      => 'required',
            'option_4'      => 'required',
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
