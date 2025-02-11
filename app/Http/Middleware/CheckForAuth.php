<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckForAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the current route is the admin login route
        if ($request->is('admin/login')) {
            // If the admin is already authenticated, redirect to the dashboard
            if (Auth::guard('admin')->check()) {
                return redirect()->route('admins.dashboard');
            }
        }

        // Proceed with the request if not redirected
        return $next($request);
    }
}
