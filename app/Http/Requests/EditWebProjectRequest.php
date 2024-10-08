<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class EditWebProjectRequest extends FormRequest
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
            'link' => 'nullable',
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            $project = $this->project;
            $newMedias = $this->file('path') ? count($this->file('path')) : 0;
            $existingMedias = $project->medias()->get()->count();
            if ($existingMedias + $newMedias === 0) {
                $validator->errors()->add(
                    'path',
                    __("form.path.error")
                );
            }
        });
    }
}
