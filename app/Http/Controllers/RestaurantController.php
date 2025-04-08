<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Category;
use App\Models\Item;

class RestaurantController extends Controller
{
    public function index()
    {

        return view('restaurants.index', [
            'restaurants' => Restaurant::with('categories')->get()
        ]);
    }

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

    public function show($id)
    {
        return view('restaurants.show', [
            'restaurant' => Restaurant::with('categories.items')->findOrFail($id),
        ]);
    }

    public function edit($id)
    {
        return view('restaurants.edit', [
            'restaurant' => Restaurant::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->update($request->all());
        return redirect()->route('restaurants.index');
    }

    public function destroy($id)
    {
        Restaurant::findOrFail($id)->delete();
        return redirect()->route('restaurants.index');
    }

}
