<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Items;
use Illuminate\Http\RedirectResponse;
use Carbon\Carbon;

class ItemsController extends Controller
{
    public function index() {
        $items = Items::all();
        return view("items.index", [
            'items' => $items
        ]);
    }

    public function delete(Request $request) {
        Items::destroy($request->route('id'));
        return redirect('/items');
    }

    public function edit(Request $reques) {
        $item = Items::find($request->route('id'));
        return view('items.edit', [
            'item' => $item,
        ]);
    }

    public function update(Request $request) {
        $item = Items::find($request->route('id'));
        $item->name = $request->name;
        $item->updated_at = Carbon::now() -> toDateTimeString();
        $item->save();
        return redirect('/items');
    }

    public function create() {
        return view('items.create');
    }

    public function new(Request $req) {
        $item = new Items;
        $item->name = $req->name;
        $item->created_at = Carbon::now() -> toDateTimeString();
        $item-> updated_at = Carbon::now() -> toDateTimeString();
        $item->save();
        return redirect('/items');
    }
}
