<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;

Route::get('/', function () {
    return view('welcome');
});

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






