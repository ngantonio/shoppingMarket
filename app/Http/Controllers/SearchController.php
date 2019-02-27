<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class SearchController extends Controller
{
    public function show(Request $request){
        
        $query = $request->input('query');
        $products = Product::where('name', 'LIKE', '%'.$query.'%')->paginate(9);
        return view('search')->with(compact('products','query'));
    }
}
