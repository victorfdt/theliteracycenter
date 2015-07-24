<?php

namespace App\Http\Middleware;

use Closure;

class MonthlyReport
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
        if($request->user() == null){
            return redirect('/');
        } else if($request->user()->isVolunteer() || $request->user()->isAdmin()){
            return $next($request);
        }

        return $next($request);
    }
}
