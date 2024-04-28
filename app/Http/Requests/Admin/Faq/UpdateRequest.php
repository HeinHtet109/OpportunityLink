<?php

namespace App\Http\Requests\Admin\Faq;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'ques' => 'required|max:100|string',
            'ans' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'ques.required' => 'Question field is required',
            'ques.max' => 'Question field can not greater than 100 characters.',
            'ques.string' => 'Question field must be characters.',
            'ans.required' => 'Answer field is required'
        ];
    }
}
