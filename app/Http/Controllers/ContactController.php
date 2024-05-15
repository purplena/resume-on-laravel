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
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'message' => 'required|max:500',
            ]);

            Contact::create($request->all());

            return redirect()
                ->back()
                ->with([
                    'success' => 'Thank you for contacting me See ya!',
                ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Return a JSON response with the validation errors
            // dd($e->validator->failed());
            // dd($e->errors());

            return response()->json([
                'errors' => $e->errors(),
            ], 422);
        }
    }

        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'message' => 'required|max:500',
        // ]);

        // Contact::create($request->all());

        // return redirect()
        //     ->back()
        //     ->with([
        //         'success' => 'Thank you for contacting me! See ya!',
        //     ]);
    // }
}
