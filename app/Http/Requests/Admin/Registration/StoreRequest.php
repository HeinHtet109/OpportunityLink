<?php

namespace App\Http\Requests\Admin\Registration;

use App\Traits\ImageTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class StoreRequest extends FormRequest
{
    use ImageTrait;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return request()->user()->is_SuperAdmin() ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:admins,name',
            'photo' => 'nullable|image|mimes:png,jpg,jpeg',
            'email' => 'required|email|string',
            'password' => 'required|confirmed',
        ];
    }

    public function validated($key = null, $default = null)
    {
        $photo_url = $this->uploadImage($this->file('photo'), 'photo', USER_DEFAULT_IMG_PATH, true);
        return array_merge(parent::validated(), ['photo' => $photo_url, 'password' => Hash::make($this->input('password'))]);
    }
}
