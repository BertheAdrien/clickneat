<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PromoCode;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class PromoCodeController extends Controller
{
    public function index()
    {
        $restaurant_id = Auth::user()->restaurant_id;

        if (is_null($restaurant_id)) {
            return view('promoCodes.index', [
                'codePromo' => PromoCode::with('category')->get()
            ]);
        }

        return view('managerRestaurant.promoCodes.index', [
            'codePromo' => PromoCode::where('restaurant_id', $restaurant_id)->with('category')->get()
        ]);
    }

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