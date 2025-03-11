<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AuthenticateExclude
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$guards)
    {
        // Check if the current route is the payment route
        if ($request->route()->getName() == 'perfectmoney.payment') {
            // The current route is the payment route, so exclude it from authentication
            return $next($request);
        }

        // Check if the user is authenticated
        if (Auth::guard($guards)->check()) {
            // User is authenticated, continue with the request
            return $next($request);
        }

        // User is not authenticated, redirect to the login page
        return redirect()->guest(route('login'));
    }
}
