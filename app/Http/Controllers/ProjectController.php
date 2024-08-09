<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditWebProjectRequest;
use App\Http\Requests\StoreWebProjectRequest;
use App\Http\Resources\WebProjectResource;
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

    public function show(Project $project)
    {
        return view('project', [
            'project' => new WebProjectResource($project)
        ]);
        // return response()->json(['status' => true, 'project' => new WebProjectResource($project)]);
    }

    public function store(StoreWebProjectRequest $request, ProjectService $service): RedirectResponse
    {
        $service->storeProject();

        return redirect('/admin/projects')->with('status', __('status.project.uploaded'));
    }

    public function update(Project $project, EditWebProjectRequest $request, ProjectService $service): RedirectResponse
    {
        $service->updateProject($project);

        return redirect('/admin/projects')->with('status', __('status.project.updated'));
    }

    public function destroyAll(): RedirectResponse
    {
        if(collect(auth()->user()->webProjects())->isEmpty()) {
            return back()->with('status', __('status.project.delete.all.error'));
        }

        auth()->user()->webProjects()->each->delete();

        return back()->with('status', __('status.project.delete.all'));
    }

    public function destroySelected(ProjectService $service): RedirectResponse
    {
        if (!$service->returnSelectedIds()) {
            return redirect('/admin/projects')->with('status', __('status.project.delete.failed'));
        }

        $deletedCount = $service->destroySelectedProjects();
        $message = __('status.project.delete.selected') . " " . trans_choice('status.project', $deletedCount, ['value' => $deletedCount]);

        return redirect('/admin/projects')->with('status', $message);
    }

    public function destroy(Project $project): JsonResponse
    {
        $project->delete();

        return response()->json(['status' => __('status.project.delete')], HttpResponse::HTTP_OK);
    }
}
