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
        if (Auth::guard('profesor')->check()|| Auth::guard("apoderado")->check() || Auth::guard("administrativo")->check() || Auth::guard("alumno")->check() || Auth::guard("administrador")->check()) {
            return redirect('/home');
        }

        return $next($request);
    }
}
