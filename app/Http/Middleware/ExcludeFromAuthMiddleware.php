<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ExcludeFromAuthMiddleware
{
    public function handle($request, Closure $next)
    {
        if ($request->is('code')) {
            return $next($request);
        }

        return redirect('guest.result');
    }
}