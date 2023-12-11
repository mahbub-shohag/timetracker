<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check() and $request->is('api/*')) {
                return response()->json([
                    'message'=>'You are logged in',
                    'data'=>[]
                ]);

                //return redirect(RouteServiceProvider::HOME);
            }elseif (Auth::guard($guard)->check()){
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}