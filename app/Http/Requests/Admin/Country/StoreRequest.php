<?php

namespace App\Http\Requests\Admin\Country;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|unique:countries,flag',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please Select Country.'
        ];
    }

    public function validated($key = null, $default = null)
    {
        return array_merge(parent::validated(), ['name' => COUNTRY_LIST[$this->input('name')], 'flag' => $this->input('name')]);
    }
}
