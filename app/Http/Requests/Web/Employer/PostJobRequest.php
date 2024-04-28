<?php

namespace App\Http\Requests\Web\Employer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class PostJobRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required',
            'offer_salary' => 'required',
            'expired_at' => 'required|after:' . now(),
            'job_category_id' => 'required',
            'experience_level' => 'required|in:' . Arr::join(EXPERIENCE_LEVEL, ','),
            'location' => 'required',
        ];
    }

    public function messages() {
        return [
            'job_category_id.required' => 'Please Select Job Category.',
            'expired_at.required' => 'Please Select Closed Date.',
            'expired_at.after' => 'Closed Date must be a date after '. now(),
            'experience_level.required' => 'Please Select Experience Level.',
            'description.required' => 'Job Description and Job Responsible are required.',
        ];
    }

    public function validated($key = null, $default = null) {
        return array_merge(parent::validated() + ['user_id' => $this->user()->id, 'description' => str_replace("'", "", $this->input('description'))]);
    }
}
