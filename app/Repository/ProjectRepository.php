<?php

namespace App\Repository;

use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Carbon;

class ProjectRepository
{
    public function projectsThisYear($projectCategory): Collection
    {
        return Project::whereBetween(
            'created_at',
            [
             Carbon::now()->startOfYear(),
             Carbon::now()
        ]
        )
        ->where('category', '=', $projectCategory)->get();
    }

    public function projectsThisMonth($projectCategory): Collection
    {
        return Project::where('created_at', '>=', Carbon::now()->startOfMonth())
            ->where('category', '=', $projectCategory)
            ->get();
    }

    public function projectsLastYear($projectCategory): Collection
    {
        return Project::whereBetween(
            'created_at',
            [
                Carbon::now()->startOfYear()->subYear(),
                Carbon::now()->startOfYear()->subDay()
            ]
        )->where('category', '=', $projectCategory)->get();
    }

    public function projectsThisMonthLastYear($projectCategory): Collection
    {
        $startOfMonthLastYear = Carbon::now()->startOfMonth()->subYear();
        $endOfMonthLastYear = Carbon::now()->endOfMonth()->subYear();

        return Project::whereBetween('created_at', [$startOfMonthLastYear, $endOfMonthLastYear])
            ->where('category', '=', $projectCategory)
            ->get();
    }

    public function search($search, $paginate, $projectCategory): LengthAwarePaginator
    {
        return Project::where('title', 'like', "%{$search}%")
                ->where('category', '=', $projectCategory)
                ->with('medias')
                ->latest()
                ->paginate($paginate)
                ->withQueryString();
    }

    public function getAllProjectsByCategory($category)
    {
        return Project::where('category', '=', $category)->get();
    }
}
