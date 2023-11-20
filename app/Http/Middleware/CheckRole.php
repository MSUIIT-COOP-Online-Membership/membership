<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Check if the user is authenticated and has a role
        if ($request->user() && in_array($request->user()->role, $roles)) {
            return $next($request);
        }
        return redirect()->back()->withErrors(['error' => 'Unauthorized Access']);
    }
}
