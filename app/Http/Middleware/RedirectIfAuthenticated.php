<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard('admin')->check()) {
            return redirect('/admin');
        }else if (Auth::guard('seksi')->check()) {
            return redirect('/seksi');
        }else if (Auth::guard('loket')->check()) {
            return redirect('/loket');
        }

        return $next($request);
    }
}
