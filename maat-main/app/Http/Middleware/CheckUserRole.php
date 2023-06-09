<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role1, $role2 = null)
    {
        if ($request->user()->rol_id != $role1 && $request->user()->rol_id != $role2) {
            return redirect()->back()->withErrors(['No está autorizado para acceder a esta página.'])->withInput();
        }
        return $next($request);
    }

}
