<?php

namespace App\Http\Requests\Web\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterRequest extends FormRequest
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
            'type' => 'required|in:work,hire',
            'username' => 'required|max:50',
            'phone' => 'required|max:50',
            'email' =>'required|email|unique:users,email,',
            'password'  => 'required|confirmed',
            'term' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'term.required' => 'Please accept our terms and conditions!'
        ];
    }

    public function validated($key = null, $default = null)
    {
        if($this->input('type')) {
            return array_merge(parent::validated(), ['name' => $this->input('username'),'role' => $this->input('type') == 'work' ? 'freelancer' : 'employer', 'password' => Hash::make($this->input('password'))]);
        }
        return parent::validated();
    }

     /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function registration($request): void
    {
        $user = User::create($request);

        Auth::login($user);
    }
}
