<?php

namespace App\Repository;

use App\Models\Illustration;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Carbon;

class IllustrationRepository
{
    public function illustrationsThisYear(): Collection
    {
        return Illustration::whereBetween(
            'created_at',
            [
             Carbon::now()->startOfYear(),
             Carbon::now()
        ]
        )->get();
    }

    public function illustrationsThisMonth(): Collection
    {
        return Illustration::where('created_at', '>=', Carbon::now()->startOfMonth())->get();
    }

    public function illustrationsLastYear(): Collection
    {
        return Illustration::whereBetween(
            'created_at',
            [
                Carbon::now()->startOfYear()->subYear(),
                Carbon::now()->startOfYear()->subDay()
            ]
        )->get();
    }

    public function illustrationsThisMonthLastYear(): Collection
    {
        $startOfMonthLastYear = Carbon::now()->startOfMonth()->subYear();
        $endOfMonthLastYear = Carbon::now()->endOfMonth()->subYear();

        return Illustration::whereBetween('created_at', [$startOfMonthLastYear, $endOfMonthLastYear])->get();
    }

    public function search($request, $paginate): LengthAwarePaginator
    {
        return Illustration::where('title', 'like', "%{$request->input('search')}%")->latest()->paginate($paginate)->withQueryString();
    }
}
