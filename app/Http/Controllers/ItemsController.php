<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Http\RedirectResponse;
use Carbon\Carbon;

class ItemsController extends Controller
{
    public function index() {
        $items = Item::all();
        return view("items.index", [
            'items' => $items
        ]);
    }

    public function destroy(Request $request, string $id) {
        Item::destroy($id);
        return redirect('/items');
    }

    public function edit(Request $request, string $id) {
        $item = Item::find($id);
        return view('items.edit', [
            'item' => $item,
        ]);
    }

    public function update(Request $request, string $id) {
        Item::find($id) -> update([
            'name' => $request -> name,
        ]);
        return redirect('/items');
    }

    public function create() {
        return view('items.create');
    }

    public function store(Request $req) {
        Item::create([
            'name' => $req -> name    
        ]);
        return redirect('/items');
    }
}
