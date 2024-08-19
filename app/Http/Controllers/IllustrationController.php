<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditIllustrationRequest;
use App\Http\Requests\StoreIllustrationRequest;
use App\Models\Project;
use App\Services\ProjectService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;

class IllustrationController extends Controller
{
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

    private function returnProjectData($request)
    {
        return [
            'user_id'       => auth()->id(),
            'title'         => $request->input('title'),
            'category'      => $request->input('projectCategory'),
            'files'          => $request->hasFile('path') ? $request->file('path') : null,
        ];
    }

    public function store(StoreIllustrationRequest $request, ProjectService $service): RedirectResponse
    {
        $service->storeProject($this->returnProjectData($request));

        return redirect('/admin/illustrations')->with('status', __('status.illustration.uploaded'));
    }

    public function update(Project $project, EditIllustrationRequest $request, ProjectService $service): RedirectResponse
    {
        $service->updateProject($project, $this->returnProjectData($request));

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
        $message = __('status.illustration.delete.selected') . " " . trans_choice('status.illustration', $deletedCount, ['value' => $deletedCount]);

        return redirect('/admin/illustrations')->with('status', $message);
    }

    public function destroy(Project $project): JsonResponse
    {
        $project->delete();

        return response()->json(['status' => __('status.illustration.delete')], HttpResponse::HTTP_OK);
    }
}
