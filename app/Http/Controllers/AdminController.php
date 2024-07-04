<?php

namespace App\Http\Controllers;

use App\Models\Photo;

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
            'photos' => Photo::latest()->paginate(20)
        ]);
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store()
    {
        request()->validate([
            'title' => 'required',
            'path' => ['required', 'image'],
        ]);

        Photo::create([
            'user_id' => auth()->id(),
            'title' => request()->input('title'),
            'path' => request()->file('path')->store('path')
        ]);

        return redirect('/admin')->with('success', 'You uploaded a new photo!');
    }

    public function destroy(Photo $photo)
    {
        $photo->delete();

        return back()->with('success', 'Photo has been deleted!');
    }
}
