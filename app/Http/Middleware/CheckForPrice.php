<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session; // Import the Session facade

class CheckForPrice
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): mixed  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the current URL is 'traveling/pay' or 'traveling/success'
        if ($request->is('traveling/pay') || $request->is('traveling/success')) {
            // Check if the price is 0
            if (Session::get('prices') == 0) {
                abort(403); // Forbidden
            }
        }

        return $next($request);
    }
}
