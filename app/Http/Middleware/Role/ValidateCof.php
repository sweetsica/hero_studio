<?php

namespace App\Http\Middleware\Role;

use App\Http\Traits\HasResponseApi;
use App\Models\Role;
use Closure;
use Illuminate\Http\Request;

class ValidateCof
{
    use HasResponseApi;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth('sanctum')->user();
        if ($user->hasRole(Role::ROLE_COF)) {
            return $next($request);
        }

        return $this->apiErrorResponse();
    }
}
