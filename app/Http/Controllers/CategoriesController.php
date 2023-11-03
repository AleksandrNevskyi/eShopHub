<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index() {
        $cats = Category::all();
        return view('categories.index', [
            'cats' => $cats,    
        ]);
    }

    public function destroy(string $id) {
        Category::destroy($id);
        return redirect('/categories');
    }

    public function edit(string $id) {
        $cat = Category::find($id);
        return view('categories.edit', [
            'cat'=>$cat    
        ]);
    }

    public function update(Request $req, string $id){
        $validated = $req->validate([
            'name' => 'required',
            'desc' => 'required'
        ]); 
        Category::find($id) -> update([
            'name' => $req -> name,
            'description' => $req -> desc,
        ]);
        return redirect('/categories');
    }

    public function create() {
        return view('categories.create');
    }

    public function store(Request $req) {
        $validated = $req->validate([
            'name' => 'required',
            'desc' => 'required'
        ]); 
        Category::create([
            'name' => $req -> name,
            'description' => $req -> desc
        ]);
        return redirect('/categories');
    }
}
