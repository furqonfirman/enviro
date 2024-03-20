<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CheckSessionToken
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            // Check if the user has a token
            if ($request->user()->token()) {
                return $next($request);
            }
        }
        // Redirect the user to the login page if not logged in or token not found
        return redirect()->route('login');
    }
}
