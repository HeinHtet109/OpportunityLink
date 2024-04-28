<?php

namespace App\Http\Requests\Admin\Registration;

use App\Traits\ImageTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'required|unique:admins,name,' . $this->route('registration') . ',slug',
            'photo' => 'nullable|image|mimes:png,jpg,jpeg',
            'email' => 'required|email|string',
            'password' => 'nullable|confirmed',
        ];
    }

    public function validated($key = null, $default = null)
    {
        if ($this->hasFile('photo')) {
            $photo_url = $this->uploadImage($this->file('photo'), 'photo', USER_DEFAULT_IMG_PATH, true);
        }else{
            $photo_url = null;
        }

        if ($this->has('password') && $this->filled('password')) {
            $password = Hash::make($this->input('password'));
        }else{
            $password = null;
        }

        return array_merge(parent::validated(), ['password' => $password, 'photo' => $photo_url]);
    }
}
