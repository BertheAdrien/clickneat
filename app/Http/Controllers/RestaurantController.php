<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Category;
use App\Models\Item;

class RestaurantController extends Controller
{
    // Affiche la liste des restaurants
    public function index()
    {

        return view('restaurants.index', [
            'restaurants' => Restaurant::with('categories')->get()
        ]);
    }

    // Affiche le formulaire de création de restaurant
    public function create()
    {
        return view('restaurants.create');
    }

    public function store(Request $request)
    {
        $restaurant = new Restaurant();

        $restaurant->name = $request->get('name');
        
        $restaurant->save();
    
        return redirect()->route('restaurants.index');
    }

    // Affiche les détails d’un restaurant
    public function show($id)
    {
        return view('restaurants.show', [
            'restaurant' => Restaurant::with('categories.items')->findOrFail($id),
        ]);
    }

    // Affiche le formulaire de modification d’un restaurant
    public function edit($id)
    {
        return view('restaurants.edit', [
            'restaurant' => Restaurant::findOrFail($id)
        ]);
    }

    // Met à jour un restaurant
    public function update(Request $request, $id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->update($request->all());
        return redirect()->route('restaurants.index');
    }

    // Supprime un restaurant
    public function destroy($id)
    {
        Restaurant::findOrFail($id)->delete();
        return redirect()->route('restaurants.index');
    }

}
