<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? ['web','admin'] : $guards;
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check() && $guard == 'admin') {
                return redirect(RouteServiceProvider::ADMINHOME);
            }

            if (Auth::guard($guard)->check() && $guard == 'web') {
                if(Auth::guard($guard)->user()->role == FREELANCER) {
                    return redirect(RouteServiceProvider::FREELANCERHOME);
                }else if(Auth::guard($guard)->user()->role == EMPLOYER){
                    return redirect(RouteServiceProvider::EMPLOYERHOME);
                }
            }
        }

        return $next($request);
    }
}
