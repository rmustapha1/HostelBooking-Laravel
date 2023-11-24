<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the authenticated user is an admin
        if ($request->user() && $request->user()->isAdmin()) {
            return $next($request);
        }

        // If not an admin, redirect or handle the unauthorized access as needed
        return redirect('/')->with('error', 'Unauthorized access.');
    }
}
