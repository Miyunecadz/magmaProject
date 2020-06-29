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
    public function handle($request, Closure $next, ...$roles)
    {
        foreach($roles as $role){

            if(auth()->user()->getRoles() == $role){
                return $next($request);
            }
        }
        throw new AuthorizationException('You do not have permission to view this page');        
    }
}
