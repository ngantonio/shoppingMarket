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
        return view('admin.products.create');  // Formulario de registro de produto
    }

    public function store(Request $request){
        //dd($request->all());                  // parametros de la solicitud
        
        // Pendiente Validar campos
        $product = new Product();
        $product->name                = $request->input('name');
        $product->price               = $request->input('price');   
        $product->description         = $request->input('description');   
        $product->description_details = $request->input('desc');
        $product->save();

        # responder al cliente
        return redirect('/admin/products');
    }
    
    public function edit($id_product){

        $foundProduct = Product::find($id_product);
        return view('admin.products.edit')->with(compact('foundProduct'));
    }

    public function update(Request $request, $id){
        
        $product = Product::find($id);

        $product->name                = $request->input('name');
        $product->price               = $request->input('price');   
        $product->description         = $request->input('description');   
        $product->description_details = $request->input('desc');
        $product->save();

        return redirect('/admin/products');
    }

    public function destroy($id){

        $product = Product::find($id);
        $product->destroy(1);

        return back();

    }
}
