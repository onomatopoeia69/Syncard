<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => [
                'required',
                'exists:users,id',
            ],

            'username' => [
                'required',
                'string',
                'max:255',
                'unique:profiles,username',
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
            'user_id.required' => 'Please select a user.',
            'user_id.exists' => 'The selected user does not exist.',

            'username.required' => 'Username is required.',
            'username.unique' => 'This username is already taken.',

            'address.string' => 'Home address must be a valid text value.',
        ];
    }
}
