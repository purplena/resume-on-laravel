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
}
