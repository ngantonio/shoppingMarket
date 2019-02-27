<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class TestController extends Controller
{
    public function welcome(){

        #Inyectamos a la vista, compact crea un arreglo asociativo
        $allProducts = Product::orderBy('popularity','DESC')->limit(6)->get();
        return view("welcome")->with(compact('allProducts'));
    }

    // mostrar categorias que tengan al menos un producto
   //has verifica la existencis de relaciones
    //$categories = Category::has('products')->
}
