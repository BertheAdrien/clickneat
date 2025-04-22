<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Category;
use App\Models\Item;
use App\Models\Restaurant;

use Illuminate\Support\Facades\Auth;


class ManagerRestaurantController extends Controller
{
    public function index()
    {
        return view('managerRestaurant.dashboard', [
            'restaurant' => Auth::user()->restaurant
        ]);
    }
    
    /**
     * Affiche le tableau de bord du gestionnaire de restaurant
     */
    public function dashboard()
    {
        $restaurantId = Auth::user()->restaurant_id;
        $restaurantName = Restaurant::find($restaurantId);

    // Optionnel pour debug
    // dd($restaurant);

    return view('managerRestaurant.dashboard', compact('restaurantName'));
    }
        
        /**
         * Affiche la liste des catégories du restaurant
     */
    public function categories()
    {
        $restaurant = Auth::user()->restaurant_id;
        $categories = Category::where('restaurant_id', $restaurant)->get();

    return view('managerRestaurant.categories.index', compact('categories'));
    }

    public function items()
    {
        $restaurant = Auth::user()->restaurant_id;
        $categoryIds = Category::where('restaurant_id', $restaurant)->pluck('id');
        $items = Item::whereIn('category_id', $categoryIds)->get();
        return view('managerRestaurant.items.index', compact('items'));
    }
    
    public function orders()
    {
        $restaurant = Auth::user()->restaurant_id;
        $orders = Order::where('restaurant_id', $restaurant)
            ->where('status', 'validated')
            ->with(['user', 'items'])
            ->get();
        return view('managerRestaurant.orders.index', compact('orders'));
    }
    
    public function completeOrder($orderId)
    {
        $order = Order::findOrFail($orderId);
        $order->status = 'ready';
        $order->save();
        return redirect()->route('managerRestaurant.orders.index');
    }
}