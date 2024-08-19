<?php

namespace App\Services;

use App\Http\DTO\ProjectDataDTO;
use App\Http\DTO\ProjectStatsDTO;
use App\Models\Media;
use App\Models\Project;
use App\Repository\ProjectRepository;
use Illuminate\Support\Carbon;

class ProjectService
{
    public function __construct(private ProjectRepository $projectRepository)
    {
    }

    public function getStatsPerProjectCategory($projectCategory): ProjectStatsDTO
    {
        $instance                   = $this->projectRepository;
        $month                      = Carbon::now()->monthName;
        $currentYear                = Carbon::now()->year;
        $lastYear                   = Carbon::now()->subYear()->format('Y');
        $projectsThisMonth          = $instance->projectsThisMonth($projectCategory)->count();
        $projectsThisMonthLastYear  = $instance->projectsThisMonthLastYear($projectCategory)->count() ;
        $projectsThisYear           = $instance->projectsThisYear($projectCategory)->count();
        $projectsLastYear           = $instance->projectsLastYear($projectCategory)->count();

        if ($projectsThisMonthLastYear > 0) {
            $monthVsMonth = ceil(($projectsThisMonth - $projectsThisMonthLastYear) / $projectsThisMonthLastYear * 100);
        } elseif ($projectsThisMonthLastYear == 0 && $projectsThisMonth == 0) {
            $monthVsMonth = 0;
        } else {
            $monthVsMonth = 100;
        }

        if ($projectsLastYear > 0) {
            $yearVsYear = ceil(($projectsThisYear - $projectsLastYear) / $projectsLastYear * 100);
        } elseif ($projectsLastYear == 0 && $projectsThisYear == 0) {
            $yearVsYear = 0;
        } else {
            $yearVsYear = 100;
        }

        return new ProjectStatsDTO(
            $projectsThisMonth,
            $projectsThisYear,
            $projectsLastYear,
            $projectsThisMonthLastYear,
            $month,
            $currentYear,
            $lastYear,
            $monthVsMonth,
            $yearVsYear
        );
    }

    public function getProjects($projectId, $projectCategory, $search): array
    {
        $project    = Project::find($projectId);
        $projects   = $this->projectRepository->search($search, 3, $projectCategory);

        return [
            'projects'  => $projects,
            'project'   => $project
        ];
    }

    public function storeProject(array $projectData): void
    {
        $project = Project::create(
            ProjectDataDTO::projectDataArray($projectData)
        );

        if($projectData['category'] == Project::CATEGORY_WEB) {
            foreach ($projectData['files'] as $file) {
                Media::create([
                    'project_id'    => $project->id,
                    'path'          => $file->store('media'),
                ]);
            }
        } else {
            Media::create([
                'project_id'        => $project->id,
                'path'              => $projectData['file']->store('media'),
        ]);
        }
    }

    public function updateProject($project, $projectData): void
    {
        if ($projectData['files']) {
            if($project->category == Project::CATEGORY_WEB) {
                foreach ($projectData['files'] as $file) {
                    Media::create([
                        'project_id'    => $project->id,
                        'path'          => $file->store('media'),
                    ]);
                }
            } else {
                if($project->medias()->first()) {
                    $project->medias()->first()->update([
                        'path' => $projectData['files']->store('media'),
                    ]);
                } else {
                    Media::create([
                        'project_id'    => $project->id,
                        'path'          => $projectData['files']->store('media'),
                    ]);
                }
            }
        }

        $project->update(ProjectDataDTO::projectDataArray($projectData));
    }

    public function destroySelectedProjects(array $ids): int
    {
        return Project::whereIn('id', $ids)->delete();
    }
}
