<?php

namespace App\Http\Controllers;

use App\Repository\IllustrationRepository;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function __construct(private IllustrationRepository $illustrationRepository)
    {
    }

    public function index()
    {
        $instance = $this->illustrationRepository;
        $month = Carbon::now()->format('F');
        $currentYear = Carbon::now()->year;
        $lastYear = Carbon::now()->subYear()->format('Y');
        $illustrationsThisMonth = $instance->illustrationsThisMonth()->count();
        $illustrationsThisMonthLastYear = $instance->illustrationsThisMonthLastYear()->count() ;
        $illustrationsThisYear = $instance->illustrationsThisYear()->count();
        $illustrationsLastYear = $instance->illustrationsLastYear()->count();
        $monthVsMonth = ceil(($illustrationsThisMonth - $illustrationsThisMonthLastYear) / $illustrationsThisMonthLastYear * 100);
        $yearVsYear = ceil(($illustrationsThisYear - $illustrationsLastYear) / $illustrationsLastYear * 100);

        return view(
            'admin.index',
            [
                'illustrationsThisMonth' => $illustrationsThisMonth,
                'illustrationsThisYear' => $illustrationsThisYear,
                'illustrationsLastYear' => $illustrationsLastYear,
                'illustrationsThisMonthLastYear' => $illustrationsThisMonthLastYear,
                'month' => $month,
                'currentYear' => $currentYear,
                'lastYear' => $lastYear,
                'monthVsMonth' => $monthVsMonth,
                'yearVsYear' => $yearVsYear

            ],
        );
    }
}
