<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class TestController extends Controller
{
    public function welcome(){

        $allProducts = Product::all();
        #Inyectamos a la vista, compact crea un arreglo asociativo
        return view("welcome")->with(compact('allProducts'));
    }
}
