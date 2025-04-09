<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Item;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Afficher le panier de l'utilisateur
     */
    public function cart()
    {
        $order = $this->getCurrentOrder();
        
        return view('client.cart', compact('order'));
    }

    /**
     * Ajouter un item au panier (commande en cours)
     */
    public function addItem(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'item_id' => 'required|exists:items,id',
            'quantity' => 'required|integer|min:1',
            'restaurant_id' => 'required|exists:restaurants,id'
        ]);
        
        // Récupérer l'item et ses informations
        $item = Item::findOrFail($validated['item_id']);

        // Vérifier que l'item appartient bien au restaurant
        $restaurant = Restaurant::findOrFail($validated['restaurant_id']);
        $itemBelongsToRestaurant = $restaurant->categories()
            ->whereHas('items', function($query) use ($item) {
                $query->where('id', $item->id);
            })
            ->exists();
            
        if (!$itemBelongsToRestaurant) {
            return redirect()->back()->with('error', 'Cet article n\'appartient pas à ce restaurant.');
        }
        
        // Récupérer ou créer une commande en cours
        $order = $this->getCurrentOrder($restaurant->id);
        
        // Vérifier si l'item existe déjà dans la commande
        $orderItem = $order->items()->where('item_id', $item->id)->first();
        
        if ($orderItem) {
            // Mettre à jour la quantité
            $orderItem->quantity += $validated['quantity'];
            $orderItem->save();
        } else {
            // Créer un nouvel item de commande
            OrderItem::create([
                'order_id' => $order->id,
                'item_id' => $item->id,
                'name' => $item->name,
                'quantity' => $validated['quantity'],
                'price' => $item->price,
            ]);
        }
        
        // Mettre à jour le montant total
        $order->total_price = $order->calculateTotal();
        $order->save();
        
        return redirect()->back()->with('success', 'Article ajouté au panier');
    }
    
    /**
     * Supprimer un item du panier
     */
    
     public function removeItem($id)
     {

         $orderItem = OrderItem::findOrFail($id);
         
         // Vérifier que l'item appartient bien à l'utilisateur
         $order = $this->getCurrentOrder();
         
         if ($orderItem->order_id !== $order->id) {
            return redirect()->back()->with('error', 'Cet article n\'appartient pas à votre panier.');
         }

        // Supprimer l'item
        $orderItem->delete();
        
        // Mettre à jour le montant total
        $order->total_price = $order->calculateTotal();
        $order->save();
        
        return redirect()->back()->with('success', 'Article supprimé du panier');
    }
    
    /**
     * Valider la commande
     */
    public function validateOrder(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'notes' => 'nullable|string',
        ]);
        
        // Récupérer la commande en cours
        $order = $this->getCurrentOrder();
        
        // Vérifier que la commande contient des articles
        if ($order->items->count() === 0) {
            return redirect()->back()->with('error', 'Votre panier est vide.');
        }
        
        // Mettre à jour les informations de la commande
        $order->notes = $validated['notes'];
        $order->status = 'validated';
        $order->save();
        
        return redirect()->route('client.confirmation', $order)->with('success', 'Votre commande a été validée.');
    }
    
    /**
     * Afficher la confirmation de commande
     */
    public function confirmation(Order $order)
    {
        // Vérifier que la commande appartient à l'utilisateur
        if ($order->user_id !== Auth::id()) {
            return redirect()->route('client.dashboard')->with('error', 'Vous n\'avez pas accès à cette commande.');
        }
        
        return view('client.confirmation', compact('order'));
    }
    
    /**
     * Récupérer ou créer une commande en cours pour l'utilisateur
     */
    private function getCurrentOrder($restaurant_id = null)
    {
        $order = Order::where('user_id', Auth::id())
            ->where('status', 'in_progress')
            ->first();
            
        if (!$order && $restaurant_id) {
            // Créer une nouvelle commande
            $order = Order::create([
                'user_id' => Auth::id(),
                'restaurant_id' => $restaurant_id,
                'status' => 'in_progress',
                'total_price' => 0,
            ]);
        }

        
        return $order;
    }



}