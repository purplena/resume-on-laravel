<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required|max:500',
        ]);

        Contact::create($request->all());

        return redirect()
            ->back()
            ->with([
                'success' => 'Thank you for contacting me! See ya!',
            ]);
    }
}
