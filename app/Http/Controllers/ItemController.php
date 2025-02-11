<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;

class ItemController extends Controller
{
    public function index()
    {
        return view('items.index', [
            'items' => Item::with('category')->get()
        ]);
    }

    public function create()
    {
        return view('items.create', [
            'categories' => Category::with('items')->get()
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

    public function show($id)
    {
        $item = Item::with('category')->findOrFail($id);
        return view('items.show', compact('item'));
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
        Item::findOrFail($id)->update($request->all());
        return redirect()->route('items.index');
    }

    public function destroy($id)
    {
        Item::findOrFail($id)->delete();
        return redirect()->route('items.index');
    }

}
