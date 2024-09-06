<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class StoreWebProjectRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|unique:projects',
            'path' => ['required', 'array'],
            'path.*' => ['image', File::image()->max('2mb')],
            'description' => 'required',
            'github' => 'required',
            'link' => 'nullable'
        ];
    }
}
