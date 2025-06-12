<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PromoCode;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class PromoCodeController extends Controller
{
    // Affiche la liste des produits selon le rôle : admin voit tout, manager voit ceux de son restaurant
    public function index()
    {
        $restaurant_id = Auth::user()->restaurant_id;

        if (is_null($restaurant_id)) {
            // Admin : tous les produits avec leur catégorie
            return view('promoCodes.index', [
                'promoCodes' => PromoCode::with('category')->get()
            ]);
        }

        // Manager : uniquement les produits de son restaurant
        return view('managerRestaurant.promoCodes.index', [
            'promoCodes' => PromoCode::where('restaurant_id', $restaurant_id)->with('category')->get()
        ]);
    }

    // Affiche le formulaire de création de produit (admin)
    public function create()
    {
        return view('promoCodes.create', [
            'categories' => Category::with('promoCodes')->get()
        ]);
    }

    public function store(Request $request)
    {   
        $promoCode = new PromoCode();

        $promoCode->name = $request->get('name');
        $promoCode->category_id = $request->get('category_id');
        $promoCode->cost = $request->get('cost');
        $promoCode->price = $request->get('price');
        
        $promoCode->save();
    
        return redirect()->route('promoCodes.index');
    }

    public function storeManagerRestaurant(Request $request)
    {   
        $promoCode = new PromoCode();

        $promoCode->name = $request->get('name');
        $promoCode->category_id = $request->get('category_id');
        $promoCode->cost = $request->get('cost');
        $promoCode->price = $request->get('price');
        
        $promoCode->save();
    
        return redirect()->route('managerRestaurant.promoCodes.index');
    }

} 