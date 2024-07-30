<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditIllustrationRequest;
use App\Http\Requests\StoreWebProjectRequest;
use App\Models\Media;
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
            'projectData' => $projectData,
            'projectCategory' => Project::CATEGORY_WEB,
            'route' => 'project'
        ]);
    }

    public function store(StoreWebProjectRequest $request): RedirectResponse
    {
        $project = Project::create([
            'user_id' => auth()->id(),
            'title' => request()->input('title'),
            'category' => request()->input('projectCategory'),
            'project_data' => $this->returnProjectData(),
        ]);


        foreach (request()->file('path') as $file) {
            Media::create([
                'project_id' => $project->id,
                'path' => $file->store('media'),
            ]);
        }

        return redirect('/admin/projects')->with('status', __('status.illustration.uploaded'));
    }

    private function returnProjectData(): array
    {
        if (request()->input('description') || request()->input('github')) {
            $projectData = [
                'description' => request()->input('description'),
                'github' => request()->input('github'),
                'link' => request()->input('github') ?? null,
            ];
        } else {
            $projectData = [];
        }

        return $projectData;
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
