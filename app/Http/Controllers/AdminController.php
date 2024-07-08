<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIllustrationRequest;
use App\Models\Illustration;

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
            'photos' => Illustration::latest()->paginate(20)
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

        return redirect('/admin')->with('success', 'You uploaded a new photo!');
    }

    public function destroy(Illustration $photo)
    {
        $photo->delete();

        return back()->with('success', 'Photo has been deleted!');
    }
}
