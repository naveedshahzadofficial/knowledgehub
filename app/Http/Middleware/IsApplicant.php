<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class IsApplicant
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
          if (auth()->user()->is_admin) {
            abort(403);
        }

        return $next($request);
    }
}