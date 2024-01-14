<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Status
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user() && Auth::user()->status == 'approve') {
            return $next($request);
        } else if  (Auth::user() && Auth::user()->status == 'banned'){
            response('Unauthorized', 401);
        }  else {
            abort(403, 'Forbidden');
        }
    }
}
