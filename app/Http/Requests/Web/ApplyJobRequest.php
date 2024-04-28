<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class ApplyJobRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'job' => 'required',
            'resume' => 'required|file|mimes:pdf',
            'resume_text' => 'nullable',
        ];
    }

    public function messages() {
        return [
            'job.required' => 'Something went wrong!',
            'resume.required' => 'Resume file is required.',
            'resume.file' => 'Invalid File.',
            'resume.mimes' => 'Only Pdf file allow.',
        ];
    }

    public function validated($key = null, $default = null)
    {
        return array_merge(parent::validated(), ['user_id' => $this->user()->id]);
    }
}
