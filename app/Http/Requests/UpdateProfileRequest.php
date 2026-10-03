<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $profile = $this->route('profile');

        return [
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('profiles', 'username')
                    ->ignore($profile->id),
            ],

            'job_title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'company' => [
                'nullable',
                'string',
                'max:255',
            ],

            'bio' => [
                'nullable',
                'string',
            ],

            'phone' => [
                'nullable',
                'regex:/^09[0-9]{9}$/',
            ],

            'address' => [
                'nullable',
                'string',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'username.required' => 'Username is required.',
            'username.unique' => 'This username is already taken.',
        ];
    }
}
