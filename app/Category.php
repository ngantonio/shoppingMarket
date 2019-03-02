<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    #Funcionalidad para el metodo Create
    #Asignacion Masiva.. Massive Assiggnment
    protected $fillable = ['name', 'description'];

    // Mensages y reglas para la validacion de campos
    // Son propiedades del modelo
    public static $messages = [
        'name.required'         => 'Es necesario ingresar un nombre para la categoria.',
        'name.min'              => 'El nombre de la categoria debe tener al menos 3 caracteres.',
        'description.max'       => 'La descripción corta solo admite hasta 200 caracteres.'
    ];
    public static  $rules = [
        'name'        => 'required|min:3',
        'description' => 'max:200',
    ];

    public function products(){
        # Una categoria tiene muchos productos
        # La relacion inversa debe de estar definida en el modelo Product
        return $this->hasMany(Product::class);
    }

    #Accesor
    public function getFeaturedImageUrlAttribute(){
        
        #Si la categoria tiene una imagen la devolvemos, sino, devolvemos la imagen del primer producto
        if($this->image){
            return '/images/categories/'.$this->image;
        }
            
        #accedemos a los productos asociados a esta categoria
        # y tomamos el primero
        $firstProduct = $this->products()->first();
        if($firstProduct)
            return $firstProduct->featured_image_url;
        else
            return '/images/products/default.png';
    }
}
