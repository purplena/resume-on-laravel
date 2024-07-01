<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response as HttpResponse;

class SessionsController extends Controller
{
    public function login()
    {
        return view('sessions.login');
    }

    public function store(StoreUserRequest $request)
    {
 
        $credentials = $request->validated();
        
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect('/')->with('status', 'Welcome back');;
        }

        return response()->json([
            'status' => false,
            'message' => __('auth.failed'),
        ], HttpResponse::HTTP_BAD_REQUEST);
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('status', 'Goodbye!');
    }
}
