<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    public function index(){
        $allProducts = Product::paginate(10);
        return view('admin.products.index')->with(compact('allProducts'));        // Listado de productos
    }

    public function create(){
        $categories = Category::orderBy('name')->get();
        return view('admin.products.create')->with(compact('categories'));  // Formulario de registro de produto
    }

    public function store(Request $request){
    
        // Validacion de campos
        $messages = [
            'name.required'         => 'Es necesario ingresar un nombre para el producto.',
            'name.min'              => 'El nombre del producto debe tener al menos 3 caracteres.',
            'description.required'  => 'La descripción corta es un campo obligatorio.',
            'description.max'       => 'La descripción corta solo admite hasta 200 caracteres.',
            'price.required'        => 'Es obligatorio definir un precio para el producto.',
            'price.numeric'         => 'Ingrese un precio válido.',
            'price.min'             => 'No se admiten valores negativos.'
        ];

        $rules = [
            'name'        => 'required|min:3',
            'description' => 'required|max:200',
            'price'       => 'required|numeric|min:0'
        ];
        
        $this->validate($request, $rules, $messages);
        
        $product = new Product();
        $product->name                = $request->input('name');
        $product->category_id         = $request->input('category_id');
        $product->price               = $request->input('price');   
        $product->description         = $request->input('description');   
        $product->description_details = $request->input('desc');
        $product->save();

        # responder al cliente
        return redirect('/admin/products');
    }
    
    public function edit($id_product){

        $foundProduct = Product::find($id_product);
        $categories = Category::orderBy('name')->get();
        return view('admin.products.edit')->with(compact('foundProduct','categories'));
    }

    public function update(Request $request, $id){

        // Validacion de campos

        $messages = [
            'name.required'         => 'Es necesario ingresar un nombre para el producto.',
            'name.min'              => 'El nombre del producto debe tener al menos 3 caracteres.',
            'description.required'  => 'La descripción corta es un campo obligatorio.',
            'description.max'       => 'La descripción corta solo admite hasta 200 caracteres.',
            'price.required'        => 'Es obligatorio definir un precio para el producto.',
            'price.numeric'         => 'Ingrese un precio válido.',
            'price.min'             => 'No se admiten valores negativos.'
        ];

        $rules = [
            'name'        => 'required|min:3',
            'description' => 'required|max:200',
            'price'       => 'required|numeric|min:0'
        ];
        
        $this->validate($request, $rules, $messages);
        
        $product = Product::find($id);

        $product->name                = $request->input('name');
        $product->price               = $request->input('price');   
        $product->category_id         = $request->input('category_id');
        $product->description         = $request->input('description');   
        $product->description_details = $request->input('desc');
        $product->save();

        return redirect('/admin/products');
    }

    public function destroy($id){

        $product = Product::find($id);
        $product->delete();

        return back();
    }
}
