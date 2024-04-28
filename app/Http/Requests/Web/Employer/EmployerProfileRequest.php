<?php

namespace App\Http\Requests\Web\Employer;

use App\Traits\ImageTrait;
use Illuminate\Foundation\Http\FormRequest;

class EmployerProfileRequest extends FormRequest
{
    use ImageTrait;
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        if($this->input('status')) {
            return [
                'status' => 'required',
            ];
        } else{
            return [
                'logo' => isset($this->user()->employerProfile) ? 'nullable' :  'required',
                'company_name' => 'required',
                'team_size' => 'required',
                'website' => 'nullable|string',
                'company_phone' => 'required',
                'since' => 'nullable',
                'city_id' => 'required',
                'address' => 'required',
                'biography' => 'nullable',
            ];
        }
    }

    public function validated($key = null, $default = null)
    {
        if ($this->hasFile('logo')) {
            $img = $this->uploadImage($this->file('logo'), 'company-logo');

            return array_merge(parent::validated(), ['logo' => $img]);
        }

        return parent::validated();
    }
}
