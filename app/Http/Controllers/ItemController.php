<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;

use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function index()
    {
        $restaurant_id = Auth::user()->restaurant_id;
        if (is_null($restaurant_id)) {
            return view('items.index', [
                'items' => Item::with('category')->get()
            ]);
        }
        return view('managerRestaurant.items.index', [
            'items' => Item::where('restaurant_id', $restaurant_id)->with('category')->get()
        ]);
    }

    public function create()
    {
        return view('items.create', [
            'categories' => Category::with('items')->get()
        ]);
    }

    public function createManagerRestaurant()
    {
        $restaurant_id = Auth::user()->restaurant_id;
    
        return view('managerRestaurant.items.create', [
            'categories' => Category::where('restaurant_id', $restaurant_id)->with('items')->get(),
            'restaurant' => $restaurant_id
        ]);
    }

    public function store(Request $request)
    {   
        $item = new Item();

        $item->name = $request->get('name');
        $item->category_id = $request->get('category_id');
        $item->cost = $request->get('cost');
        $item->price = $request->get('price');
        
        $item->save();
    
        return redirect()->route('items.index');
    }

    public function storeManagerRestaurant(Request $request)
    {   
        $item = new Item();

        $item->name = $request->get('name');
        $item->category_id = $request->get('category_id');
        $item->cost = $request->get('cost');
        $item->price = $request->get('price');
        
        $item->save();
    
        return redirect()->route('managerRestaurant.items.index');
    }

    public function show($id)
    {
        $item = Item::with('category')->findOrFail($id);
        return view('items.show', compact('item'));
    }

    public function showManagerRestaurant($id)
    {
        $item = Item::with('category')->findOrFail($id);
        return view('managerRestaurant.items.show', compact('item'));
    }

    public function editManagerRestaurant($id)
    {
        $restaurant_id = Auth::user()->restaurant_id;

        return view('managerRestaurant.items.edit', [
            'item' => Item::findOrFail($id),
            'categories' => Category::where('restaurant_id', $restaurant_id)->with('items')->get()
        ]);
    }

    public function edit($id)
    {
        return view('items.edit', [
            'item' => Item::findOrFail($id),
            'categories' => Category::with('items')->get()
        ]);
    }

    public function update(Request $request, $id)
    {
        if (Auth::user()->restaurant_id == null) {
            
            return redirect()->route('items.index');
        }
        Item::findOrFail($id)->update($request->all());
        return redirect()->route('managerRestaurant.items.index');
    }

    public function destroy($id)
    {
        $restaurant_id = Auth::user()->restaurant_id;
        if ($restaurant_id == null) {
            Item::findOrFail($id)->delete();
            return redirect()->route('items.index');
        }
        Item::findOrFail($id)->delete();
        return redirect()->route('managerRestaurant.items.index');
    }

}
