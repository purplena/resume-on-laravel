<?php

namespace App\Repository;

use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Carbon;

class ProjectRepository
{
    public function projectsThisYear(int $projectCategory): Collection
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

    public function projectsThisMonth(int $projectCategory): Collection
    {
        return Project::where('created_at', '>=', Carbon::now()->startOfMonth())
            ->where('category', '=', $projectCategory)
            ->get();
    }

    public function projectsLastYear(int $projectCategory): Collection
    {
        return Project::whereBetween(
            'created_at',
            [
                Carbon::now()->startOfYear()->subYear(),
                Carbon::now()->startOfYear()->subDay()
            ]
        )->where('category', '=', $projectCategory)->get();
    }

    public function projectsThisMonthLastYear(int $projectCategory): Collection
    {
        $startOfMonthLastYear = Carbon::now()->startOfMonth()->subYear();
        $endOfMonthLastYear = Carbon::now()->endOfMonth()->subYear();

        return Project::whereBetween('created_at', [$startOfMonthLastYear, $endOfMonthLastYear])
            ->where('category', '=', $projectCategory)
            ->get();
    }

    public function search(?string $search, ?int $paginate, int $projectCategory): LengthAwarePaginator
    {
        return
            Project::where(function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                ->orWhereNull('title');
            })
                ->where('category', '=', $projectCategory)
                ->with('medias')
                ->with('genre')
                ->with('languages')
                ->latest()
                ->paginate($paginate)
                ->withQueryString();
    }

    public function filterIllustrations(int $genreId, ?int $paginate, int $projectCategory): LengthAwarePaginator
    {
        return Project::where('genre_id', '=', $genreId)
            ->where('category', '=', $projectCategory)
            ->with('medias')->latest()
            ->paginate($paginate)
            ->withQueryString();
    }

    public function getAllProjectsByCategory(int $projectCategory)
    {
        return Project::where('category', '=', $projectCategory)->get();
    }
}
