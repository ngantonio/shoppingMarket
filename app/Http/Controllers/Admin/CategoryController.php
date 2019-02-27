<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;


class CategoryController extends Controller
{
    public function index(){
        $allCategories= Category::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.categories.index')->with(compact('allCategories'));        // Listado de productos
    }

    public function create(){
        return view('admin.categories.create');  // Formulario de registro de produto
    }

    public function store(Request $request){
        // Validar Campos
        $this->validate($request, Category::$rules, Category::$messages);

        # Crear una categoria de forma abreviada, para eso tenemos que
        # añadir una funcionalidad en el modelo Category
        Category::create($request->all());        
        # responder al cliente
        return redirect('/admin/categories');
    }

    #Conversion sobre la marcha
    #esa conversion ejecuta el find de la categoria
    public function edit(Category $category){
        return view('admin.categories.edit')->with(compact('category'));
    }

    public function update(Request $request, Category $category){
          
        $this->validate($request, Category::$rules, Category::$messages);
        $category->update($request->all());

        return redirect('/admin/categories');
    }

    public function destroy(Category $category){

        $category->delete();
        return redirect('/admin/categories');
    }
}
