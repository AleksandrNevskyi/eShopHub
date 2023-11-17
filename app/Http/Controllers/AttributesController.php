<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attribute;

class AttributesController extends Controller
{
    public function index(){
        $attributes = Attribute::all();
        return view('attributes.index', [
            'attributes'=>$attributes
        ]);
    }

    public function destroy(string $id) {
        Attribute::destroy($id);
        return redirect('/attributes');
    }

    public function edit(string $id){
        $attribute = Attribute::find($id);
        return view('attributes.edit', [
            'attribute'=>$attribute
        ]);
    }

    public function update(Request $req, string $id){
        $validated = $req->validate([
            'name' => 'required'
        ]); 
        Attribute::find($id)->update([
            'name' => $req -> name
        ]);
        return redirect('/attributes');
    }
}
