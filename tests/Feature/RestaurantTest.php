<?php

use App\Models\Restaurant;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Category;
use App\Models\Item;
use App\Models\Order;

// TU001 - Création d’un restaurant
it('crée un restaurant valide', function () {
    $restaurant = Restaurant::create(['name' => 'Burger House']);
    expect($restaurant->id)->not->toBeNull();
});

// TU003 - Association user → resto
it('associe un utilisateur à un restaurant', function () {
    $restaurant = Restaurant::create(['name' => 'Test Resto']);
    $user = User::create([
        'name' => 'Bob',
        'email' => 'bob@example.com',
        'password' => Hash::make('password'),
        'restaurant_id' => $restaurant->id
    ]);
    expect($user->restaurant_id)->toBe($restaurant->id);
});

it('crée une catégorie liée à un restaurant existant', function () {
    // Crée un restaurant avant de tester la catégorie
    $restaurant = Restaurant::factory()->create(); // Crée un restaurant de test

    // Crée une catégorie liée au restaurant créé
    $category = Category::factory()->create([
        'restaurant_id' => $restaurant->id
    ]);

    // Vérifie que la catégorie est bien associée au restaurant
    expect($category->restaurant_id)->toBe($restaurant->id);
});


