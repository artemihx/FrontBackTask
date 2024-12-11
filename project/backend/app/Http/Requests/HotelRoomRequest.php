<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelRoomRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'width' => 'required|numeric',
            'height' => 'required|numeric',
            'length' => 'required|numeric',
            'price' => 'required|numeric',
            'on_main' =>'required|boolean',
        ];
    }
}
