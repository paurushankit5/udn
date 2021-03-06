<?php

namespace App\Http\Middleware;

use Closure;

class CheckSuperUser
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
        if(\Auth::check() && \Auth::user()->is_superuser )
            return $next($request);

        return response()->json('Unauthorized' , '401');
    }
}
