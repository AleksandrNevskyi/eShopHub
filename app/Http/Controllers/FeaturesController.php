<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feature;
use App\Models\Attribute;
use App\Models\Attribute_value;

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
            'attributes' => $attributes,
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
        $attributes = Attribute::all();
        return view('features.create');
    }

    public function store(Request $req){
        $validated = $req->validate([
            'name' => 'required'
        ]);

        $feature = Feature::create([
            'name' => $req -> name
        ]);

        return redirect('/features');
    }

    public function add_attr(string $id, Request $req){
        $atr_values = Attribute_value::where("attribute_id", $req -> attr) -> get();
        return view('features.add_attr', [
            'values' => $atr_values,
            'feature' => $id,
            'attr' => $req->attr    
        ]);
    }

    public function store_attr(string $id, Request $req) {
        $feature = Feature::find($id);
        // dd($req->attr);
        $feature->attributes()->attach($req->attr, [
            'value_id' => Attribute_value::find($req->Value)->id
        ]);
        return redirect('/features');
    }
}
