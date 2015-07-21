<?php

namespace App\Http\Middleware;

use Closure;

class VerifyUserAsVolunteer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->user() == null || !$request->user()->isVolunteer()){
            return redirect('/');
        }

        return $next($request);
    }

}
