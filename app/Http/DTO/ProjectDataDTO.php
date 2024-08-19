<?php

namespace App\Http\DTO;

class ProjectDataDTO
{
    public static function projectDataArray(array $projectData)
    {
        return [
            'user_id'       => $projectData['user_id'],
            'title'         => $projectData['title'],
            'category'      => $projectData['category'],
            'project_data' => isset($projectData['description'], $projectData['github']) ?
                ['description' => $projectData['description'],
                'github'      => $projectData['github'],
                'link'        => $projectData['link']] : []
        ];
    }
}
