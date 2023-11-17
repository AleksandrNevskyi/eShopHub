<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attribute_value;
use App\Models\Attribute;

class Attribute_ValuesController extends Controller
{
    public function index(){
        $values = Attribute_value::all();
        return view('attribute_values.index', [
            'values'=>$values
        ]);
    }

    public function destroy(string $id){
        Attribute_value::destroy($id);
        return redirect('/attribute_values');
    }

    public function edit(string $id){
        $value = Attribute_value::find($id);
        return view('attribute_values.edit', [
            'value'=> $value
        ]);
    }

    public function update(string $id, Request $req){
        $validated = $req->validate([
            'name' => 'required',
        ]); 

        Attribute_value::find($id)->update([
            'name' => $req -> name
        ]);

        return redirect('/attribute_values');
    }

    public function create(){
        $attributes = Attribute::all();
        return view('attribute_values.create', [
            'attributes' => $attributes
        ]);
    }

    public function store(Request $req){
        $validated = $req->validate([
            'name' => 'required',
        ]); 
        Attribute_value::create([
            'name' => $req -> name,
            'attribute_id' => $req -> attribute
        ]);

        return redirect ('/attribute_values');
    }
}
