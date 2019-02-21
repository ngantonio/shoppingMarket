<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index(){
        $allProducts = Product::paginate(10);
        return view('admin.products.index')->with(compact('allProducts'));        // Listado de productos
    }

    public function create(){
        return view('admin.products.create');        // Formulario de registro de produto
    }

    public function store(){

    }
}
