<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Models\Location;
use App\Models\Feature;
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
	    $locations = Location::all();
        $features = Feature::all();

        // dd($item);
        return view('items.edit', [
            'item' => $item,
            'category' => $cat,
            'categories' => $cats,
            'locations' => $locations,
            'features' => $features
        ]);
    }

   public function update(Request $request, string $id) {
    //    dd($request -> cat_id);
        $validated = $request->validate([
            'name' => 'required',
        ]);        
        Item::find($id) -> update([
            'name' => $request -> name,
            'category_id' => $request -> cat_id  
        ]);
        $item = Item::find($id);

        $item->locations()->sync(array_keys($request->item_location));

        $item->features()->sync(array_keys($request->item_feature));
        return redirect('/items');
    }

    public function create() {
        $cats = Category::all();
        $locations = Location::all();
        $features = Feature::all();
        return view('items.create', [
            'categories' => $cats,
            'locations' => $locations,
            'features' => $features    
        ]);
    }

    public function store(Request $req) {
        $validated = $req->validate([
            'name' => 'required',
        ]); 
        $item = Item::create([
            'name' => $req -> name, 
            'category_id' => $req -> cat_id    
        ]);
        // dd($req->item_location);
        $item->locations()->attach(array_keys($req->item_location));

        $item->features()->attach(array_keys($req->item_feature));

        return redirect('/items');
    }
}
