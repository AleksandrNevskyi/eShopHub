<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feature;

class FeaturesController extends Controller
{
    public function index(){
        $features = Feature::all();
        return view('features.index', [
            'features'=>$features
        ]);
    }

    public function destroy(string $id){
        Feature::destroy($id);

        return redirect('/features'); 
    }

    public function edit(string $id){
        $feature = Feature::find($id);

        return view('features.edit', [
            'feature' => $feature
        ]);
    }

    public function update(string $id, Request $req){
        $validated = $req -> validate([
            'name' => 'required'
        ]);
        Feature::find($id) -> update([
            'name' => $req -> name
        ]);

        return redirect('/features');
    }

    public function create(){
        return view('features.create');
    }

    public function store(Request $req){
        $validated = $req->validate([
            'name' => 'required'
        ]);

        Feature::create([
            'name' => $req -> name
        ]);

        return redirect('/features');
    }
}
