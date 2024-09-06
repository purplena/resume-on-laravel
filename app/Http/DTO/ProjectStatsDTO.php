<?php

namespace App\Http\DTO;

class ProjectStatsDTO
{
    public function __construct(
        public int $projectsThisMonth,
        public int $projectsThisYear,
        public int $projectsLastYear,
        public int $projectsThisMonthLastYear,
        public string $month,
        public int $currentYear,
        public int $lastYear,
        public int $monthVsMonth,
        public int $yearVsYear
    ) {
    }
}
