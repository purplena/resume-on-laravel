<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Services\ProjectService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProjectController
{
    public function index(Request $request, ProjectService $service): View
    {
        $projectData = $service->getProjects($request, Project::CATEGORY_WEB);

        return view('admin.illustrations', [
            'projectData' => $projectData,
        ]);
    }
}
