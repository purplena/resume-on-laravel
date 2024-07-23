<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class SessionsController extends Controller
{
    public function login(): View
    {
        return view('sessions.login');
    }

    public function store(StoreUserRequest $request): JsonResponse
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

    public function destroy(): RedirectResponse
    {
        auth()->logout();

        return redirect('/')->with('status', __('auth.logout.success'));
    }
}
