<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'platform' => [
                'required',
                'string',
                'max:255',
                'in:linkedin,github,twitter,facebook,instagram,youtube,tiktok,discord,telegram,reddit,twitch,snapchat,pinterest,threads,website,other',
            ],

            'username' => [
                'nullable',
                'string',
                'max:255',
            ],

            'url' => [
                'required',
                'url',
                'max:255',
            ],

            'label' => [
                'nullable',
                'string',
                'max:255',
            ],

            'icon' => [
                'nullable',
                'string',
                'max:255',
            ],
        ];
    }
}
