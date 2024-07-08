<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIllustrationRequest;
use App\Models\Illustration;
use Illuminate\Http\Request;

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

    public function create()
    {
        return view('admin.create');
    }

    public function store(StoreIllustrationRequest $request)
    {
        $request->validated();

        Illustration::create([
            'user_id' => auth()->id(),
            'title' => request()->input('title'),
            'path' => request()->file('path')->store('path')
        ]);

        return redirect('/admin/illustrations')->with('status', 'You uploaded a new photo!');
    }

    public function destroy(Illustration $illustration)
    {
        $illustration->delete();

        return redirect('/admin/illustrations')->with('status', 'Photo has been deleted!');
    }

    public function destroyAll()
    {
        $illustrations = auth()->user()->illustrations;
        $illustrations->each->delete();

        return back()->with('status', 'You deleted all photos!');
    }

    public function destroySelected(Request $request)
    {
        $ids = $request->input('selected_illustrations');
        Illustration::whereIn('id', $ids)->delete();

        return redirect()->back()->with('success', 'Photos deleted successfully.');
    }
}
