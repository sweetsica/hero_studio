<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserListPermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $allowRole = ['super admin', 'chief of department'];
        $currentRole = Auth::user()->getRoleNames();
        foreach ($currentRole as $role) {
            if (in_array($role, $allowRole)) {
                return $next($request);
            }
        }

        return redirect()->route('dashboard');
    }
}
