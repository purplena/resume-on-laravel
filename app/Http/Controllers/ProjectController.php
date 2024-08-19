<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditWebProjectRequest;
use App\Http\Requests\StoreWebProjectRequest;
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
        $projectData = $service->getProjects(
            $request->id,
            Project::CATEGORY_WEB,
            $request->input('search')
        );

        return view('admin.illustrations', [
            'projectData'       => $projectData,
            'projectCategory'   => Project::CATEGORY_WEB,
            'route'             => 'project'
        ]);
    }

    public function show(Project $project)
    {
        return view('project', [
            'project' => $project,
        ]);
    }

    private function returnProjectData($request): array
    {
        return [
            'user_id'       => auth()->id(),
            'title'         => $request->input('title'),
            'category'      => $request->input('projectCategory'),
            'description'   => $request->input('description'),
            'github'        => $request->input('github'),
            'link'          => $request->input('link') ?? null,
            'files'         => $request->hasFile('path') ? $request->file('path') : null,
        ];
    }

    public function store(StoreWebProjectRequest $request, ProjectService $service): RedirectResponse
    {
        $service->storeProject($this->returnProjectData($request));

        return redirect('/admin/projects')->with('status', __('status.project.uploaded'));
    }

    public function update(Project $project, EditWebProjectRequest $request, ProjectService $service): RedirectResponse
    {
        $service->updateProject(
            $project,
            $this->returnProjectData($request)
        );

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
        $ids = request()->input('selected_medias');
        if (!$ids) {
            return redirect('/admin/projects')->with('status', __('status.project.delete.failed'));
        }

        $deletedCount = $service->destroySelectedProjects($ids);
        $message = __('status.project.delete.selected') . " " . trans_choice('status.project', $deletedCount, ['value' => $deletedCount]);

        return redirect('/admin/projects')->with('status', $message);
    }

    public function destroy(Project $project): JsonResponse
    {
        $project->delete();

        return response()->json(['status' => __('status.project.delete')], HttpResponse::HTTP_OK);
    }
}
