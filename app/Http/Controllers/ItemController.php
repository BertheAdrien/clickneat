<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    // Affiche la liste des produits selon le rôle : admin voit tout, manager voit ceux de son restaurant
    public function index()
    {
        $restaurant_id = Auth::user()->restaurant_id;

        if (is_null($restaurant_id)) {
            // Admin : tous les produits avec leur catégorie
            return view('items.index', [
                'items' => Item::with('category')->get()
            ]);
        }

        // Manager : uniquement les produits de son restaurant
        return view('managerRestaurant.items.index', [
            'items' => Item::where('restaurant_id', $restaurant_id)->with('category')->get()
        ]);
    }

    // Affiche le formulaire de création de produit (admin)
    public function create()
    {
        return view('items.create', [
            'categories' => Category::with('items')->get()
        ]);
    }

    // Affiche le formulaire de création de produit pour un manager (restreint à ses catégories)
    public function createManagerRestaurant()
    {
        $restaurant_id = Auth::user()->restaurant_id;

        return view('managerRestaurant.items.create', [
            'categories' => Category::where('restaurant_id', $restaurant_id)->with('items')->get(),
            'restaurant' => $restaurant_id
        ]);
    }

    // Enregistre un produit (admin)
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

    // Enregistre un produit pour un restaurant (manager)
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

    // Affiche les détails d’un produit (admin)
    public function show($id)
    {
        $item = Item::with('category')->findOrFail($id);
        return view('items.show', compact('item'));
    }

    // Affiche les détails d’un produit pour un manager
    public function showManagerRestaurant($id)
    {
        $item = Item::with('category')->findOrFail($id);
        return view('managerRestaurant.items.show', compact('item'));
    }

    // Formulaire de modification d’un produit (manager)
    public function editManagerRestaurant($id)
    {
        $restaurant_id = Auth::user()->restaurant_id;

        return view('managerRestaurant.items.edit', [
            'item' => Item::findOrFail($id),
            'categories' => Category::where('restaurant_id', $restaurant_id)->with('items')->get()
        ]);
    }

    // Formulaire de modification d’un produit (admin)
    public function edit($id)
    {
        return view('items.edit', [
            'item' => Item::findOrFail($id),
            'categories' => Category::with('items')->get()
        ]);
    }

    // Met à jour un produit (manager uniquement)
    public function update(Request $request, $id)
    {
        if (Auth::user()->restaurant_id == null) {
            // Interdiction pour les admins de modifier ici
            return redirect()->route('items.index');
        }

        Item::findOrFail($id)->update($request->all());
        return redirect()->route('managerRestaurant.items.index');
    }

    // Supprime un produit (accessible aux deux profils)
    public function destroy($id)
    {
        $restaurant_id = Auth::user()->restaurant_id;

        Item::findOrFail($id)->delete();

        if ($restaurant_id == null) {
            return redirect()->route('items.index');
        }

        return redirect()->route('managerRestaurant.items.index');
    }
}
