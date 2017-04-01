<?php

namespace App\Http\Middleware;

use Closure; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;


class Authenticate
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    

    public function handle($request, Closure $next, $guard = null)
    {
        if (!Auth::guard('profesor')->check() && !Auth::guard('apoderado')->check() && !Auth::guard('administrativo')->check() && !Auth::guard('alumno')->check() && !Auth::guard('administrador')->check())  {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                dd('dasdsa');
                return view('/');
            }
        }

        return $next($request);
        
    }
}
