<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function getCategory(){
        # Un producto pertenece a una categoria
        return $this->belongsTo(Category::class);
    }

    public function getImages(){
        # Un producto tiene muchas imagenes
        return $this->hasMany(ProductImage::class);
    }
}
