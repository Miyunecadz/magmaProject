<?php

namespace App\Http\Middleware;
use Illuminate\Auth\Access\AuthorizationException;

use Closure;

class Role
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
        if(auth()->user()->getRoles() != $role){
            throw new AuthorizationException('You do not have permission to view this page');
        }

        return $next($request);
    }
}
