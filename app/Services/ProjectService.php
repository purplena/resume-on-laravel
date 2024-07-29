<?php

namespace App\Services;

use App\Http\DTO\ProjectStatsDTO;
use App\Models\Project;
use App\Repository\ProjectRepository;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class ProjectService
{
    public function __construct(private ProjectRepository $projectRepository)
    {
    }

    public function getStatsPerProjectCategory($projectCategory): ProjectStatsDTO
    {
        $instance = $this->projectRepository;
        $month = Carbon::now()->monthName;
        $currentYear = Carbon::now()->year;
        $lastYear = Carbon::now()->subYear()->format('Y');
        $projectsThisMonth = $instance->projectsThisMonth($projectCategory)->count();
        $projectsThisMonthLastYear = $instance->projectsThisMonthLastYear($projectCategory)->count() ;
        $projectsThisYear = $instance->projectsThisYear($projectCategory)->count();
        $projectsLastYear = $instance->projectsLastYear($projectCategory)->count();

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

    public function getProjects(Request $request, $projectCategory): array
    {
        $project = Project::find($request->id);
        $projects = $this->projectRepository->search($request, 3, $projectCategory);

        return ['projects' => $projects, 'project' => $project];
    }
}
