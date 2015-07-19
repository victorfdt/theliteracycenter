<?php

namespace App\Http\Middleware;

use Closure;

class VerifyUserAsAdmin
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
       # $userId = $request->user()->id;
        #$user = App\User::find($userId);

        if($request->user() == null || !$request->user()->isAdmin()){
            return redirect('/');
        }

        return $next($request);
    }
}
