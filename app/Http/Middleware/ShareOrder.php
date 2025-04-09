<?php

// Créez un nouveau middleware : php artisan make:middleware ShareOrderData
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class ShareOrderData
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $order = Order::where('user_id', Auth::id())
                ->where('status', 'in_progress')
                ->first();
                
            View::share('order', $order);
        }
        
        return $next($request);
    }
}

