<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class profilauthentification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, String $profil)
    {
        if($request->user()->profils()->where('name', $profil)->exists()) return $next($request);

        abort(403);
    }
}
