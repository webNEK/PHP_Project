<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthSesion
{
    public function handle(Request $request, Closure $next)
    {
        if (!session('user')) {
            return redirect('/Login');
        }
        return $next($request);
    }
}
