<?php

namespace App\Http\DTO;

class ProjectDataDTO
{
    public function __construct(
        protected int $user_id,
        protected string $title,
        protected int $category,
        protected array $project_data,
        protected ?array $files,
        protected ?array $project_language,
    ) {
    }

    public function toArray(): array
    {
        return [
            'user_id'           => $this->user_id,
            'title'             => $this->title,
            'category'          => $this->category,
            'project_data'      => $this->project_data,
            'files'             => $this->files,
            'project_language'  => $this->project_language
        ];
    }

    public static function make(array $data): self
    {
        return new self(
            user_id:        $data['user_id'],
            title:          $data['title'],
            category:       $data['category'],
            project_data:   isset($data['description'], $data['github'])
                ?
                ['description'  => $data['description'],
                'github'        => $data['github'],
                'link'          => $data['link']]
                :
                [],
            files: $data['files'],
            project_language: isset($data['project_language']) ? $data['project_language'] : []
        );
    }
}
