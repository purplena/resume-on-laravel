<?php

namespace App\Http\Controllers;

use App\Http\DTO\ProjectDataDTO;
use App\Http\Requests\EditWebProjectRequest;
use App\Http\Requests\StoreWebProjectRequest;
use App\Models\Project;
use App\Repository\ProjectRepository;
use App\Services\ProjectService;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Http\Request;

class ProjectController
{
    public function __construct(private ProjectRepository $projectRepository)
    {
    }

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

    public function show(Project $project): View
    {
        return view('project', [
            'project'   => $project,
            'languages' => $project->languages
        ]);
    }

    public function showAll(Request $request)
    {
        $projects = $this->projectRepository->search($request->input('search'), 20, Project::CATEGORY_WEB);
        return view('projectsGallery', [
            'projects' => $projects,
            'category' => Project::CATEGORY_WEB
        ]);
    }

    private function getProjectData(FormRequest $request): array
    {
        return [
            'user_id'           => auth()->id(),
            'title'             => $request->input('title'),
            'category'          => $request->input('projectCategory'),
            'description'       => $request->input('description'),
            'github'            => $request->input('github'),
            'link'              => $request->input('link') ?? null,
            'files'             => $request->hasFile('path') ? $request->file('path') : null,
            'project_language'  => $request->input('project_language')
        ];
    }

    public function store(StoreWebProjectRequest $request, ProjectService $service): RedirectResponse
    {
        $service->storeProject(
            ProjectDataDTO::make($this->getProjectData($request))
        );

        return redirect('/admin/projects')->with('status', __('status.project.uploaded'))->withInput();
    }

    public function update(Project $project, EditWebProjectRequest $request, ProjectService $service): RedirectResponse
    {
        $service->updateProject(
            $project,
            ProjectDataDTO::make($this->getProjectData($request))
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
        $message = __('status.delete.selected') . " " . trans_choice('status.projects', $deletedCount, ['value' => $deletedCount]);

        return redirect('/admin/projects')->with('status', $message);
    }

    public function destroy(Project $project): JsonResponse
    {
        $project->delete();

        return response()->json(['status' => __('status.project.delete')], HttpResponse::HTTP_OK);
    }
}
