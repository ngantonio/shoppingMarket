<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function getProducts(){
        # Una categoria tiene muchos productos
        # La relacion inversa debe de estar definida en el modelo Product
        return $this->hasMany(Product::class);
    }
}
