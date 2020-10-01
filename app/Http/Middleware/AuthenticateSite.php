<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class AuthenticateSite {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next) {
        if (auth()->check() && auth()->user()->role === User::SiteUSER) {
            return $next($request);
        }
        return response()->json([
            'error' => 'missing or invalid authentication token',
        ], 401);
    }
}
