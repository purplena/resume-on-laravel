<?php

namespace App\Http\DTO;

class IllustrationStatsDTO
{
    public function __construct(
        public int $illustrationsThisMonth,
        public int $illustrationsThisYear,
        public int $illustrationsLastYear,
        public int $illustrationsThisMonthLastYear,
        public string $month,
        public int $currentYear,
        public int $lastYear,
        public int $monthVsMonth,
        public int $yearVsYear
    ) {
    }
}
