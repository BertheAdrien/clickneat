<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index()
    {
        return view('client.dashboard', [
            'restaurants' => Restaurant::all()
        ]);
    }

    public function show($id)
    {
        $restaurant = Restaurant::with('categories.items')->findOrFail($id);
        return view('client.restaurantShow', [
            'restaurant' => $restaurant
        ]);
    }
}
