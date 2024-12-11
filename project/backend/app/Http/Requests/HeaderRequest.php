<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HeaderRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'city' => 'string',
            'slogan' => 'string',
            'adress' => 'string',
            'phone' => 'string',
            'email' => 'string',
            'worktime' => 'string',
            'vk' => 'string',
            'tg' => 'string',
            'whatsapp' => 'string'
        ];
    }
}
