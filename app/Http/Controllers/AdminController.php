<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Services\ProjectService;
use Illuminate\Contracts\View\View;

class AdminController extends Controller
{
    public function index(ProjectService $service): View
    {
        return view(
            'admin.index',
            [
                'projectsStats' => $service->getStatsPerProjectCategory(Project::CATEGORY_ART),
            ],
        );
    }
}
