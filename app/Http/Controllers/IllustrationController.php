<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditIllustrationRequest;
use App\Http\Requests\StoreIllustrationRequest;
use App\Models\Media;
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
        $projectData = $service->getProjects($request, Project::CATEGORY_ART);

        return view('admin.illustrations', [
            'projectData' => $projectData,
        ]);
    }

    public function store(StoreIllustrationRequest $request): RedirectResponse
    {
        $project = Project::create([
            'user_id' => auth()->id(),
            'title' => request()->input('title'),
            'category' => Project::CATEGORY_ART,
            'project_data' => [],
        ]);

        Media::create([
                'project_id' => $project->id,
                'path' => request()->file('path')->store('media'),
        ]);

        return redirect('/admin/illustrations')->with('status', __('status.illustration.uploaded'));
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

        return redirect('/admin/illustrations')->with('status', __('status.illustration.updated'));
    }

    public function destroyAll(): RedirectResponse
    {
        auth()->user()->artProjects()->each->delete();

        return back()->with('status', __('status.illustration.delete.all'));
    }

    public function destroySelected(Request $request): RedirectResponse
    {
        $ids = $request->input('selected_illustrations');
        if (!$ids) {
            return redirect('/admin/illustrations')->with('status', __('status.illustration.delete.failed'));
        }

        $deletedCount = Project::whereIn('id', $ids)->delete();
        $message = __('status.illustration.delete.selected') . " " . trans_choice('status.illustration', $deletedCount, ['value' => $deletedCount]);

        return redirect('/admin/illustrations')->with('status', $message);
    }

    public function destroy(Project $project): JsonResponse
    {
        $project->delete();

        return response()->json(['status' => __('status.illustration.delete')], HttpResponse::HTTP_OK);
    }
}
