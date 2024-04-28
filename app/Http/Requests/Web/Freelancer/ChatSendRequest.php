<?php

namespace App\Http\Requests\Web\Freelancer;

use Illuminate\Foundation\Http\FormRequest;

class ChatSendRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'active_job_id' => 'required',
            'user_id' => 'required',
            'receiver_id' => 'required',
            'message' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'message.required' => 'Chat Message is required.'
        ];
    }
}
