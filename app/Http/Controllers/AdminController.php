<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIllustrationRequest;
use App\Models\Illustration;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;

class AdminController extends Controller
{
    public function index()
    {
        return view(
            'admin.index',
        );
    }

    public function illustrations()
    {
        return view('admin.illustrations', [
            'illustrations' => Illustration::latest()->paginate(20)
        ]);
    }

    public function storeIllustration(StoreIllustrationRequest $request)
    {
        $request->validated();

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

        if($deletedCount > 1) {
            $message = __('status.illustration.delete.selected') . " " . $deletedCount. " " . __('status.illustration.pl');
        } else {
            $message =  __('status.illustration.delete.selected') . " 1 " . __('status.illustration.sg');
        }


        return redirect('/admin/illustrations')->with('status', $message);
    }
}
