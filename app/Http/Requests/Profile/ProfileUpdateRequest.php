<?php

namespace App\Http\Requests\Profile;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Traits\ImageTrait;

class ProfileUpdateRequest extends FormRequest
{
    use ImageTrait;
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        if($this->hasFile('photo')) {
            return [
                'photo' => ['required', 'image', 'mimes:png,jpg', 'max:1024']
            ];
        }else{
            return [
                'name' => ['required', 'string', 'max:255'],
                'phone' => request()->user('web') ? ['required', 'string'] : ['nullable', 'string'],
                'email' => ['required', 'email', 'max:255', Rule::unique($this->user('web') ? User::class : Admin::class)->ignore($this->user()->id)],
            ];
        }
    }

    public function validated($key = null, $default = null) {
        if($this->hasFile('photo')) {
            $img = $this->uploadImage($this->file('photo'), 'profile');

            return array_merge(parent::validated(), ['photo' => $img]);
        }

        return parent::validated();
    }
}
