<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Merchant
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
        if(auth()->user()->roles->name == 'Merchant'){
            return $next($request);
        }
        abort(404);
    }
}
