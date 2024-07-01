<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        //QUESTION
        // return $request->expectsJson() ? null : route('login');
        //Here I prefer to redirect to home if a not authenticated user tries to access the forbidden routes
        return $request->expectsJson() ? null : route('home');
    }
}
