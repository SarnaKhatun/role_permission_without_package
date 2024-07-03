<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $role, $permission = null)
    {
        $user = $request->user();

        // Check if the user is authenticated
        if ($user === null) {
            abort(404);
        }

        // Check if the user has the required role
        if (!$user->hasRole($role)) {
            abort(404);
        }

        // Check if the user has the required permission if one is specified
        if ($permission !== null && !$user->can($permission)) {
            abort(404);
        }

        return $next($request);
    }
}
