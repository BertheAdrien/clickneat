<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use App\Models\Order;

Route::middleware('auth')->group(function () {
    Route::get('/', [RedirectController::class, 'handle'])->name('home');
    Route::middleware('role:restaurant')->get('/dashboard/restaurant', [DashboardController::class, 'restaurant'])->name('dashboard.restaurant');

    Route::middleware('role:admin')->group(function () {

        Route::get('/dashboard/admin', [DashboardController::class, 'admin'])->name('dashboard.admin');

        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users/create', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/show/{id}', [UserController::class, 'show'])->name('users.show');
        Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/update/{id}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    
        Route::get('/restaurants', [RestaurantController::class, 'index'])->name('restaurants.index');
        Route::get('/restaurants/create', [RestaurantController::class, 'create'])->name('restaurants.create');
        Route::post('/restaurants/create', [RestaurantController::class, 'store'])->name('restaurants.store');
        Route::get('/restaurants/show/{id}', [RestaurantController::class, 'show'])->name('restaurants.show');
        Route::get('/restaurants/edit/{id}', [RestaurantController::class, 'edit'])->name('restaurants.edit');
        Route::put('/restaurants/update/{id}', [RestaurantController::class, 'update'])->name('restaurants.update');
        Route::delete('/restaurants/destroy/{id}', [RestaurantController::class, 'destroy'])->name('restaurants.destroy');
    
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/categories/create', [CategoryController::class, 'store'])->name('categories.store');  
        Route::get('/categories/show/{id}', [CategoryController::class, 'show'])->name('categories.show');  
        Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('/categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/categories/destroy/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    
        Route::get('/items', [ItemController::class, 'index'])->name('items.index');
        Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
        Route::post('/items/create', [ItemController::class, 'store'])->name('items.store');
        Route::get('/items/show/{id}', [ItemController::class, 'show'])->name('items.show');
        Route::get('/items/edit/{id}', [ItemController::class, 'edit'])->name('items.edit');
        Route::put('/items/update/{id}', [ItemController::class, 'update'])->name('items.update');
        Route::delete('/items/destroy/{id}', [ItemController::class, 'destroy'])->name('items.destroy');
    
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');    
    });

    Route::middleware('role:client')->group(function () {
        Route::get('/client/dashboard', [ClientController::class, 'index'])->name('client.dashboard');
        Route::get('/client/restaurantShow/{id}', [ClientController::class, 'show'])->name('client.restaurantShow');
        
        
        Route::get('/client/confirmation/{id}', [OrderController::class, 'confirmation'])->name('client.confirmation');
        Route::post('/client/restaurantShow', [OrderController::class, 'addItem'])->name('order.addItem');
        Route::get('/client/restaurantShow', [OrderController::class, 'cart'])->name('client.cart');
        Route::get('/client/cart', [OrderController::class, 'cart'])->name('client.cart');
        Route::post('/client/cart', [OrderController::class, 'validateOrder'])->name('order.validateOrder');
        Route::delete('/order/removeItem/{id}', [OrderController::class, 'removeItem'])->name('order.removeItem');

        Route::get('/client/restaurantShow/{id}', [ClientController::class, 'show'])->name('client.restaurantShow');
        // Route::get('/client/dashboard', [OrderController::class, 'index'])->name('client.dashboard');

    });
});

require __DIR__.'/auth.php';
