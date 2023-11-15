<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Models\Location;
use App\Models\Location_item;
use Illuminate\Http\RedirectResponse;
use Carbon\Carbon;

class ItemsController extends Controller
{
    public function index() {
        $items = Item::all();
        return view("items.index", [
            'items' => $items,
        ]);
    }

    public function destroy(Request $request, string $id) {
        Item::destroy($id);
        return redirect('/items');
    }

    public function edit(Request $request, string $id) {
        $item = Item::find($id);
        $cat = Category::find($item->category_id);
        $cats = Category::all();
        return view('items.edit', [
            'item' => $item,
            'category' => $cat,
            'categories' => $cats
        ]);
    }

   public function update(Request $request, string $id) {
        $validated = $request->validate([
            'name' => 'required',
        ]);        
        Item::find($id) -> update([
            'name' => $request -> name,
            'category_id' => $request -> cat_id  
        ]);
        return redirect('/items');
    }

    public function create() {
        $cats = Category::all();
        $locations = Location::all();
        return view('items.create', [
            'categories' => $cats,
            'locations' => $locations    
        ]);
    }

    public function store(Request $req) {
        $validated = $req->validate([
            'name' => 'required',
        ]); 
        Item::create([
            'name' => $req -> name,
            'category_id' => $req -> cat_id    
        ]);
        return redirect('/items');
    }
}
