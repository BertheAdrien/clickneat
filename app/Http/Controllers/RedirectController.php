<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class RedirectController extends Controller
{
    public function handle()
    {
        $user = Auth::user();

        return match ($user->role) {
            'admin' => redirect()->route('dashboard.admin'),
            'restaurant' => redirect()->route('managerRestaurant.dashboard'),
            'client' => redirect()->route('client.dashboard'),
            default => abort(403, 'Rôle inconnu.'),
        };
    }
}
