<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;


class CategoryController extends Controller
{
    public function index(){
        $allCategories= Category::orderBy('created_at', 'DESC')->paginate(10);
        return view('categories.categoriespage')->with(compact('allCategories'));        // Listado de productos
    }

    public function show(Category $category){
        $products = $category->products()->paginate(9);
        return view('categories.show')->with(compact('category','products'));
    }
}
