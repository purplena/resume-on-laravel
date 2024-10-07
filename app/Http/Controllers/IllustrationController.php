<?php

namespace App\Http\Controllers;

use App\Http\DTO\ProjectDataDTO;
use App\Http\Requests\EditIllustrationRequest;
use App\Http\Requests\StoreIllustrationRequest;
use App\Models\Genre;
use App\Models\Project;
use App\Repository\ProjectRepository;
use App\Services\ProjectService;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;

class IllustrationController extends Controller
{
    public function __construct(private ProjectRepository $projectRepository)
    {
    }

    public function index(Request $request, ProjectService $service): View
    {
        $projectData = $service->getProjects(
            $request->id,
            Project::CATEGORY_ART,
            $request->input('search')
        );

        return view('admin.illustrations', [
            'projectData'       => $projectData,
            'projectCategory'   => Project::CATEGORY_ART,
            'route'             => 'illustration'
        ]);
    }

    public function showAll(Request $request): View
    {
        $projects = $this->projectRepository->search($request->input('search'), 20, Project::CATEGORY_ART);
        $genreIds = Project::where('category', '=', Project::CATEGORY_ART)->pluck('genre_id')->unique();
        $genres = $genreIds->map(function (int $id) {
            return [
                'id' => $id,
                'name' => Genre::find($id)->name
            ];
        });

        return view('projectsGallery', [
            'projects' => $projects,
            'category' => Project::CATEGORY_ART,
            'genres'   => $genres
        ]);
    }

    private function getProjectData(FormRequest $request)
    {
        return [
            'user_id'           => auth()->id(),
            'category'          => $request->input('projectCategory'),
            'files'             => $request->hasFile('path') ? $request->file('path') : null,
            'genre_id'          => $request->input('genre')
        ];
    }

    public function store(StoreIllustrationRequest $request, ProjectService $service): RedirectResponse
    {
        $service->storeProject(
            ProjectDataDTO::make($this->getProjectData($request))
        );

        return redirect('/admin/illustrations')->with('status', __('status.illustration.uploaded'));
    }

    public function update(Project $project, EditIllustrationRequest $request, ProjectService $service): RedirectResponse
    {
        $service->updateProject(
            $project,
            ProjectDataDTO::make($this->getProjectData($request))
        );

        return redirect('/admin/illustrations')->with('status', __('status.illustration.updated'));
    }

    public function destroyAll(): RedirectResponse
    {
        if(collect(auth()->user()->artProjects())->isEmpty()) {
            return back()->with('status', __('status.illustration.delete.all.error'));
        }

        auth()->user()->artProjects()->each->delete();

        return back()->with('status', __('status.illustration.delete.all'));
    }

    public function destroySelected(ProjectService $service): RedirectResponse
    {
        $ids = request()->input('selected_medias');
        if (!$ids) {
            return redirect('/admin/illustrations')->with('status', __('status.illustration.delete.failed'));
        }

        $deletedCount = $service->destroySelectedProjects($ids);
        $message = __('status.delete.selected') . " " . trans_choice('status.illustration', $deletedCount, ['value' => $deletedCount]);

        return redirect('/admin/illustrations')->with('status', $message);
    }

    public function destroy(Project $project): JsonResponse
    {
        $project->delete();

        return response()->json(['status' => __('status.illustration.delete')], HttpResponse::HTTP_OK);
    }
}
