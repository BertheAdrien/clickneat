<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['client.cart', 'client.restaurantShow', 'layouts.navigation', 'client.dashboard'], function ($view) {
            $order = null;
            
            if (Auth::check()) {
                $order = Order::where('user_id', Auth::id())
                    ->where('status', 'in_progress')
                    ->first();
            }
            
            $view->with('order', $order);
        });
    }
}
