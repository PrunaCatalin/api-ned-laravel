<?php

namespace Modules\FresciaStore\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureIsAjaxRequest
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
        if (! $request->wantsJson()) {
            // aici puteți returna o eroare sau face o redirecționare
            return response()->json(['error' => 'Not an AJAX request'], 400);
        }
        return $next($request);
    }
}
