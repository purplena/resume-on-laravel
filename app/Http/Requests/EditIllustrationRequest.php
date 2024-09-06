<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class EditIllustrationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'path' => ['array'],
            'path.*' => ['image', File::image()->max('2mb')],
            'project_data' => 'nullable'
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
            $newMedias = $this->file('path') ? 1 : 0;
            $existingMedias = $this->project->medias()->get()->count();
            if ($existingMedias + $newMedias === 0) {
                $validator->errors()->add(
                    'path',
                    __("form.path.error")
                );
            }
        });
    }
}
