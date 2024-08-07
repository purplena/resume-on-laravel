<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditWebProjectRequest;
use App\Http\Requests\StoreWebProjectRequest;
use App\Models\Media;
use App\Models\Project;
use App\Services\ProjectService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Http\Request;

class ProjectController
{
    public function index(Request $request, ProjectService $service): View
    {
        $projectData = $service->getProjects($request, Project::CATEGORY_WEB);

        return view('admin.illustrations', [
            'projectData'       => $projectData,
            'projectCategory'   => Project::CATEGORY_WEB,
            'route'             => 'project'
        ]);
    }

    public function store(StoreWebProjectRequest $request, ProjectService $service): RedirectResponse
    {
        $service->storeProject();

        return redirect('/admin/projects')->with('status', __('status.project.uploaded'));
    }

    public function update(Project $project, EditWebProjectRequest $request, ProjectService $service): RedirectResponse
    {
        $service->updateProject($project);

        return redirect('/admin/projects')->with('status', __('status.illustration.updated'));
    }

    public function destroyMedia(Media $media): JsonResponse
    {
        $media->delete();

        return response()->json(['status' => "you deleted a project's picture" ], HttpResponse::HTTP_OK);
    }
}
