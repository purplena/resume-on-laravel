<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class WebProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'github' => Arr::get($this->project_data, 'github'),
            'link' => Arr::get($this->project_data, 'link'),
            'description' => Arr::get($this->project_data, 'description'),
            'medias' => $this->medias()->get()->pluck('path')->all()
        ];
    }
}
