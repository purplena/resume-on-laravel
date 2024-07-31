<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditIllustrationRequest;
use App\Http\Requests\StoreWebProjectRequest;
use App\Models\Project;
use App\Services\ProjectService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
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

    public function update(Project $project, EditIllustrationRequest $request): RedirectResponse
    {
        $path = request()->file('path') ? request()->file('path')->store('media') : $project->medias()->first()->path;

        $project->update([
            'title' => request()->input('title'),
        ]);

        $project->medias()->first()->update([
            'path' => $path
        ]);

        return redirect('/admin/projects')->with('status', __('status.illustration.updated'));
    }
}
