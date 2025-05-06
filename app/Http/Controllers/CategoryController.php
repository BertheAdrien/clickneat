<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    // Affiche la liste de toutes les catégories avec leur restaurant associé (pour admin)
    public function index()
    {
        return view('categories.index', [
            'categories' => Category::with('restaurant')->get()
        ]);
    }

    // Affiche le formulaire de création d’une catégorie (admin)
    public function create()
    {
        return view('categories.create', [
            'restaurants' => Restaurant::with('categories')->get()
        ]);
    }

    // Affiche le formulaire de création d’une catégorie (manager)
    public function createManagerRestaurant()
    {
        return view('managerRestaurant.categories.create', [
            'restaurants' => Restaurant::with('categories')->get()
        ]);
    }

    // Enregistre une nouvelle catégorie (manager)
    public function storeManagerRestaurant(Request $request)
    {
        $category = new Category();

        $category->name = $request->get('name');
        $category->restaurant_id = $request->get('restaurant_id');
        
        $category->save();

        return redirect()->route('managerRestaurant.categories.index');
    }

    // Enregistre une nouvelle catégorie (admin)
    public function store(Request $request)
    {
        $category = new Category();

        $category->name = $request->get('name');
        $category->restaurant_id = $request->get('restaurant_id');
        
        $category->save();

        return redirect()->route('categories.index');
    }

    // Affiche les détails d’une catégorie (vue différente selon le rôle)
    public function show($id)
    {
        if (Category::findOrFail($id)->restaurant_id != Auth::user()->restaurant_id) {
            // Si admin ou autre que le restaurant lié
            return view('categories.show', [
                'category' => Category::findOrFail($id)
            ]);
        }

        // Si manager du restaurant concerné
        return view('managerRestaurant.categories.show', [
            'category' => Category::findOrFail($id)
        ]);
    }

    // Affiche le formulaire d’édition d’une catégorie (vue adaptée au rôle)
    public function edit($id)
    {
        if (Category::findOrFail($id)->restaurant_id != Auth::user()->restaurant_id) {
            // Admin
            return view('categories.edit', [
                'category' => Category::findOrFail($id),
                'restaurants' => Restaurant::with('categories')->get()
            ]);
        }

        // Manager
        return view('managerRestaurant.categories.edit', [
            'category' => Category::findOrFail($id),
            'restaurants' => Restaurant::with('categories')->get()
        ]);
    }

    // Met à jour une catégorie (accessible aux deux rôles avec redirection appropriée)
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $category->name = $request->get('name');
        $category->restaurant_id = $request->get('restaurant_id');

        $category->save();

        // Redirection selon le rôle
        if ($category->restaurant_id != Auth::user()->restaurant_id) {
            return redirect()->route('categories.index');
        }
        return redirect()->route('managerRestaurant.categories.index');
    }

    // Supprime une catégorie (redirection différente selon le rôle)
    public function destroy($id)
    {
        if (Category::findOrFail($id)->restaurant_id != Auth::user()->restaurant_id) {
            // Admin
            Category::findOrFail($id)->delete();
            return redirect()->route('categories.index');
        }

        // Manager
        Category::findOrFail($id)->delete();
        return redirect()->route('managerRestaurant.categories.index');
    }
}
