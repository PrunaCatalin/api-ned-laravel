<?php

namespace modules\FresciaStore\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgeCheckMiddleware
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
        // Check if the cookie exists and user is under 18
        if (
            !$request->cookie('alcohol_popup_viewed') &&
            Auth::guard('customer')->check() && $request->user()->getAge() < 18
        ) {
            // User is authenticated and under 18, redirect to the popup
            return redirect()->route('alcohol.popup');
        } elseif (
            !$request->cookie('alcohol_popup_viewed') &&
            !Auth::guard('customer')->check() && $request->age < 18
        ) {
            // Guest user and under 18, redirect to the popup
            return redirect()->route('alcohol.popup');
        }
        return $next($request);
    }
}
