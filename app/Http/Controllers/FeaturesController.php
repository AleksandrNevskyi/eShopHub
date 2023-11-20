<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feature;
use App\Models\Attribute;

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
        $attributes = Attribute::all();

        return view('features.edit', [
            'feature' => $feature,
            'attributes' => $attributes
        ]);
    }

    public function update(string $id, Request $req){
        $validated = $req -> validate([
            'name' => 'required'
        ]);
        Feature::find($id) -> update([
            'name' => $req -> name
        ]);

        $feature = Feature::find($id);
        $feature->attributes()->sync(array_keys($req->feature_attribute));

        return redirect('/features');   
    }

    public function create(){
        $attributes = Attribute::all();
        return view('features.create', [
            'attributes' => $attributes
        ]);
    }

    public function store(Request $req){
        $validated = $req->validate([
            'name' => 'required'
        ]);

        $feature = Feature::create([
            'name' => $req -> name
        ]);

        $feature->attributes()->attach(array_keys($req->feature_attribute));

        return redirect('/features');
    }
}
