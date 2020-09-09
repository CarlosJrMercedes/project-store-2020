<?php

namespace App\Http\Middleware;

use Closure;

class AdminRol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (auth()->check() && $request->user()->authorizeRoles(['user', $role])) {
            return $next($request);
        }

        return redirect('/');
    }
}
