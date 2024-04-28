<?php

namespace App\Http\Requests\Admin\JobCategory;

use App\Traits\ImageTrait;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    use ImageTrait;
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
            'name' => 'required|unique:job_categories,name,' . $this->route('job_category') . ',slug',
            'icon' => 'nullable|image|mimes:png'
        ];
    }

    public function validated($key = null, $default = null)
    {
        if($this->hasFile('icon')) {
            $icon_url = $this->uploadImage($this->file('icon'), 'icon', ITEM_DEFAULT_IMG_PATH, true);
            return array_merge(parent::validated(), ['icon' => $icon_url]);
        }

        return parent::validated();
    }
}
