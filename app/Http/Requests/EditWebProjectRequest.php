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
        // Rethink path required. I still need it but application is necessary in the controller

        return [
            'title' => 'required',
            'path.*' => ['image', File::image()->max('2mb')],
            'description' => 'required',
            'github' => 'required',
            'link' => 'nullable'
        ];
    }
}
