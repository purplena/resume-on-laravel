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
            $request->session()->flash('status', __('auth.login.success'));

            return response()->json([], HttpResponse::HTTP_OK);
        }

        return response()->json([
            'status' => false,
            'message' => __('auth.failed'),
        ], HttpResponse::HTTP_BAD_REQUEST);
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('status', __('auth.logout.success'));
    }
}
