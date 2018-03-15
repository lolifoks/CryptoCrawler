<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable
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

        if ( Auth::check() && Auth::user()->isAdmin() )
        {
            return $next($request);
        }

        return redirect('home');

    }
}
