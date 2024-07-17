<?php

namespace App\Repository;

use App\Models\Illustration;
use Carbon\Carbon;

class IllustrationRepository
{
    public function illustrationsThisYear()
    {
        return Illustration::whereBetween(
            'created_at',
            [
             Carbon::now()->startOfYear(),
             Carbon::now()
        ]
        )->get();
    }

    public function illustrationsThisMonth()
    {
        return Illustration::where('created_at', '>=', Carbon::now()->startOfMonth())->get();
    }

    public function illustrationsLastYear()
    {
        return Illustration::whereBetween(
            'created_at',
            [
                Carbon::now()->startOfYear()->subYear(),
                Carbon::now()->startOfYear()->subDay()
            ]
        )->get();
    }

    public function illustrationsThisMonthLastYear()
    {
        $startOfMonthLastYear = Carbon::now()->startOfMonth()->subYear();
        $endOfMonthLastYear = Carbon::now()->endOfMonth()->subYear();

        return Illustration::whereBetween('created_at', [$startOfMonthLastYear, $endOfMonthLastYear])->get();
    }
}
