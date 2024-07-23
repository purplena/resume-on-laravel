<?php

namespace App\Services;

use App\Http\DTO\IllustrationStatsDTO;
use App\Repository\IllustrationRepository;
use Illuminate\Support\Carbon;

class IllustrationService
{
    public function __construct(private IllustrationRepository $illustrationRepository)
    {
    }

    public function getStats(): IllustrationStatsDTO
    {
        $instance = $this->illustrationRepository;
        $month = Carbon::now()->monthName;
        $currentYear = Carbon::now()->year;
        $lastYear = Carbon::now()->subYear()->format('Y');
        $illustrationsThisMonth = $instance->illustrationsThisMonth()->count();
        $illustrationsThisMonthLastYear = $instance->illustrationsThisMonthLastYear()->count() ;
        $illustrationsThisYear = $instance->illustrationsThisYear()->count();
        $illustrationsLastYear = $instance->illustrationsLastYear()->count();

        if ($illustrationsThisMonthLastYear > 0) {
            $monthVsMonth = ceil(($illustrationsThisMonth - $illustrationsThisMonthLastYear) / $illustrationsThisMonthLastYear * 100);
        } elseif ($illustrationsThisMonthLastYear == 0 && $illustrationsThisMonth == 0) {
            $monthVsMonth = 0;
        } else {
            $monthVsMonth = 100;
        }

        if ($illustrationsLastYear > 0) {
            $yearVsYear = ceil(($illustrationsThisYear - $illustrationsLastYear) / $illustrationsLastYear * 100);
        } elseif ($illustrationsLastYear == 0 && $illustrationsThisYear == 0) {
            $yearVsYear = 0;
        } else {
            $yearVsYear = 100;
        }

        return new IllustrationStatsDTO(
            $illustrationsThisMonth,
            $illustrationsThisYear,
            $illustrationsLastYear,
            $illustrationsThisMonthLastYear,
            $month,
            $currentYear,
            $lastYear,
            $monthVsMonth,
            $yearVsYear
        );
    }
}
