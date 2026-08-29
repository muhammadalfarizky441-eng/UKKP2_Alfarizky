<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Memeriksa peran user (admin/user)
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (auth()->check() && auth()->user()->role === $role) {
            return $next($request);
        }

        return redirect('/dashboard')->with('error', 'Anda tidak punya akses ke halaman tersebut.');
    }
}