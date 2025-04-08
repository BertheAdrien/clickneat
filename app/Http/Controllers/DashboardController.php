<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Category;
use App\Models\Item;
use App\Models\User;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin()
    {
        // Récupérer les données nécessaires
        $restaurants = Restaurant::all();  // Récupère tous les restaurants
        $categories = Category::all();    // Récupère toutes les catégories
        $items = Item::all();              // Récupère tous les items
        $users = User::all();              // Récupère tous les utilisateurs

        // Passer les données à la vue
        return view('dashboard.admin', compact('restaurants', 'categories', 'items', 'users'));
    }

    public function restaurant()
    {
        return view('dashboard.restaurant');
    }
}
