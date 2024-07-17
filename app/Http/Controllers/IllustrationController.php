<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditIllustrationRequest;
use App\Http\Requests\StoreIllustrationRequest;
use App\Models\Illustration;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;

class IllustrationController extends Controller
{
    public function illustrations(Request $request)
    {
        $id = $request->id;
        $illustration = $id ? Illustration::findOrFail($id) : "";
        $illustrations = Illustration::where('title', 'like', "%{$request->input('search')}%")->latest()->paginate(3)->withQueryString();

        return view('admin.illustrations', [
            'illustrations' => $illustrations,
            'illustration' => $illustration,
        ]);
    }

    public function storeIllustration(StoreIllustrationRequest $request)
    {
        Illustration::create([
            'user_id' => auth()->id(),
            'title' => request()->input('title'),
            'path' => request()->file('path')->store('path')
        ]);

        return redirect('/admin/illustrations')->with('status', __('status.illustration.uploaded'));
    }

    public function destroyIllustration(Illustration $illustration)
    {
        $illustration->delete();

        return response()->json(['status' => __('status.illustration.delete')], HttpResponse::HTTP_OK);
    }

    public function destroyAllIllustrations()
    {
        $illustrations = auth()->user()->illustrations;
        $illustrations->each->delete();

        return back()->with('status', 'You deleted all photos!');
    }

    public function deleteSelectedIllustrations(Request $request)
    {
        $ids = $request->input('selected_illustrations');

        if (!$ids) {
            return redirect('/admin/illustrations')->with('status', __('status.illustration.delete.failed'));
        }

        $deletedCount = Illustration::whereIn('id', $ids)->delete();
        $message = __('status.illustration.delete.selected') . " " . trans_choice('status.illustration', $deletedCount, ['value' => $deletedCount]);

        return redirect('/admin/illustrations')->with('status', $message);
    }

    public function editIllustration(Illustration $illustration)
    {
        return response()->json(['illustration' => $illustration, 'url' => asset('storage/' . $illustration->path)], HttpResponse::HTTP_OK);
    }

    public function updateIllustration(Illustration $illustration, EditIllustrationRequest $request)
    {
        $path = $request->file('path') ? request()->file('path')->store('path') : $illustration->path;

        $illustration->update([
            'title' => request()->input('title'),
            'path' => $path
        ]);

        return redirect('/admin/illustrations')->with('status', __('status.illustration.updated'));
    }
}
