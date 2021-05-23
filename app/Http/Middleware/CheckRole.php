<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
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
        if ($request->user() == null && $request->route()->getName() != "libros.show") {
            return redirect()->route('home');
        }

        if ($request->user()->rol != "admin" && $request->route()->getName() != "libros.show") {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
