<?php

namespace App\Http\DTO;

class ProjectDataDTO
{
    public static function projectDataArray()
    {
        return [
            'description' => request()->input('description'),
            'github' => request()->input('github'),
            'link' => request()->input('github') ?? null,
        ];
    }
}
