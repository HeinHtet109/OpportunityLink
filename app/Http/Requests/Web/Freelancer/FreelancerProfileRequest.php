<?php

namespace App\Http\Requests\Web\Freelancer;

use App\Traits\ImageTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class FreelancerProfileRequest extends FormRequest
{
    use ImageTrait;
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        if ($this->input('status')) {
            return [
                'status' => 'required',
            ];
        } else {
            return [
                'profile_photo' => isset($this->user()->freelancerProfile) ? 'nullable' :  'required',
                'job_title' => 'required',
                'age' => 'required|numeric',
                'gender' => 'required|string|in:Male,Female',
                'experience_level' => 'required|in:' . Arr::join(EXPERIENCE_LEVEL, ','),
                'education_level' => 'required|in:' . Arr::join(EDUCATION_LEVEL, ','),
                'languages' => 'required|string',
                'current_salary' => 'required|string',
                'expected_salary' => 'required|string',
                'city_id' => 'required',
                'address' => 'required',
                'biography' => 'nullable',
            ];
        }
    }

    public function validated($key = null, $default = null)
    {
        if ($this->hasFile('profile_photo')) {
            $img = $this->uploadImage($this->file('profile_photo'), 'resume-photo');

            return array_merge(parent::validated(), ['profile_photo' => $img]);
        }

        return parent::validated();
    }
}
