<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use App\Models\Photo;

class AdminController extends Controller
{
    public function index()
    {
        return view(
            'admin.index',
            [
                'photos' => Photo::latest()->paginate(20)
            ]
        );
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'path' => ['required', 'image'],
        ]);

        Photo::create([
            'user_id' => auth()->id(),
            'path' => request()->file('path')->store('path')
        ]);

        return redirect('/')->with('success', 'You uploaded a new photo!');
    }

    public function destroy(Photo $photo)
    {
        $photo->delete();

        return back()->with('success', 'Photo has been deleted!');
    }
}
