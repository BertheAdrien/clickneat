<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories.index', [
            'categories' => Category::with('restaurant')->get()
        ]);
    }

    public function create()
    {
        return view('categories.create', [
            'restaurants' => Restaurant::with('categories')->get()
        ]);
    }

    public function createManagerRestaurant()
    {
        return view('managerRestaurant.categories.create', [
            'restaurants' => Restaurant::with('categories')->get()
        ]);
    }

    public function storeManagerRestaurant(Request $request)
    {

    $category = new Category();

    $category->name = $request->get('name');
    $category->restaurant_id = $request->get('restaurant_id');
    
    $category->save();

    return redirect()->route('managerRestaurant.categories.index');
    }


    public function store(Request $request)
    {

    $category = new Category();

    $category->name = $request->get('name');
    $category->restaurant_id = $request->get('restaurant_id');
    
    $category->save();

    return redirect()->route('categories.index');
    }

    public function show($id)
    {
        if (Category::findOrFail($id)->restaurant_id != Auth::user()->restaurant_id) {
            
            return view('categories.show', [
                'category' => Category::findOrFail($id)
            ]);
        }
        return view('managerRestaurant.categories.show', [
            'category' => Category::findOrFail($id)
        ]);
    }

    public function edit($id)
    {
        if (Category::findOrFail($id)->restaurant_id != Auth::user()->restaurant_id) {

            return view('categories.edit', [
                'category' => Category::findOrFail($id),
                'restaurants' => Restaurant::with('categories')->get()
            ]);
        }
        return view('managerRestaurant.categories.edit', [
            'category' => Category::findOrFail($id),
            'restaurants' => Restaurant::with('categories')->get()
        ]);
    }

    public function update(Request $request, $id) {
        $category = Category::findOrFail($id);

        $category->name = $request->get('name');
        $category->restaurant_id = $request->get('restaurant_id');

        $category->save();
    
        if (Category::findOrFail($id)->restaurant_id != Auth::user()->restaurant_id) {
            return redirect()->route('categories.index');
        }
        return redirect()->route('managerRestaurant.categories.index');
    }

    public function destroy($id)
    {
        if (Category::findOrFail($id)->restaurant_id != Auth::user()->restaurant_id) {
            Category::findOrFail($id)->delete();
            return redirect()->route('categories.index');
        }
        Category::findOrFail($id)->delete();
        return redirect()->route('managerRestaurant.categories.index');
    }
}
