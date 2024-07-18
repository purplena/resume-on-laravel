<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditIllustrationRequest;
use App\Http\Requests\StoreIllustrationRequest;
use App\Models\Illustration;
use App\Repository\IllustrationRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;

class IllustrationController extends Controller
{
    public function __construct(private IllustrationRepository $repository)
    {
    }

    public function index(Request $request): View
    {
        $illustration = Illustration::find($request->id) ?? null;
        $illustrations = $this->repository->search($request);

        return view('admin.illustrations', [
            'illustrations' => $illustrations,
            'illustration' => $illustration,
        ]);
    }

    public function store(StoreIllustrationRequest $request): RedirectResponse
    {
        Illustration::create([
            'user_id' => auth()->id(),
            'title' => request()->input('title'),
            'path' => request()->file('path')->store('path')
        ]);

        return redirect('/admin/illustrations')->with('status', __('status.illustration.uploaded'));
    }

    public function destroy(Illustration $illustration): JsonResponse
    {
        $illustration->delete();

        return response()->json(['status' => __('status.illustration.delete')], HttpResponse::HTTP_OK);
    }

    public function destroyAll(): RedirectResponse
    {
        auth()->user()->illustrations()->delete();

        return back()->with('status', __('status.illustration.delete.all'));
    }

    public function destroySelected(Request $request): RedirectResponse
    {
        $ids = $request->input('selected_illustrations');

        if (!$ids) {
            return redirect('/admin/illustrations')->with('status', __('status.illustration.delete.failed'));
        }

        $deletedCount = Illustration::whereIn('id', $ids)->delete();
        $message = __('status.illustration.delete.selected') . " " . trans_choice('status.illustration', $deletedCount, ['value' => $deletedCount]);

        return redirect('/admin/illustrations')->with('status', $message);
    }

    public function update(Illustration $illustration, EditIllustrationRequest $request): RedirectResponse
    {
        $path = $request->file('path') ? request()->file('path')->store('path') : $illustration->path;

        $illustration->update([
            'title' => request()->input('title'),
            'path' => $path
        ]);

        return redirect('/admin/illustrations')->with('status', __('status.illustration.updated'));
    }
}
