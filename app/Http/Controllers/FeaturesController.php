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
}
