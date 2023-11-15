<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;


class LocationsController extends Controller
{
    public function index() {
        $locations = Location::all();
        return view('locations.index', [
            'locations' => $locations,
        ]);
    }

    public function destroy(string $id){
        Location::destroy($id);
        return redirect('/locations');
    }

    public function edit(string $id){
        $locate  = Location::find($id);
        return view('locations.edit', [
            'location' => $locate
        ]);
    }

    public function update(Request $req, string $id){
        $validated = $req ->validate([
            'name' => 'required',
            'desc' => 'required'
        ]);
        
        Location::find($id)->update([
            'title' => $req->name,
            'desc' => $req->desc
        ]);

        Location::find($id) -> update([
            'title' => $req -> name,
            'desc' => $req -> desc
        ]);

        return redirect('/locations');
    }


    public function create() {
        return view('locations.create');
    }

    public function store(Request $req) {
        $validated = $req->validate([
            'name' => 'required',
            'desc' => 'required'
        ]); 
        Location::create([
            'title' => $req -> name,
            'desc' => $req -> desc
        ]);
        return redirect('/locations');
    }
}
