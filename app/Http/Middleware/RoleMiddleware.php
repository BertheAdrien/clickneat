<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role !== $role) {
            return match (Auth::user()->role) {
                'client' => redirect()->route('client.dashboard'),
                'restaurant' => redirect()->route('dashboard.restaurant'),
                'admin' => redirect()->route('dashboard.admin'),
                default => abort(403, 'Rôle inconnu'),
            };
        }
        return $next($request);
    }
}
