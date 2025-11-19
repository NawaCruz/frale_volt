<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Debe estar logueado
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Comparar el rol del usuario con los permitidos por la ruta
        if (! in_array(auth()->user()->role, $roles)) {
            abort(403, "No tienes permiso para acceder a esta sección.");
        }

        return $next($request);
    }
}
